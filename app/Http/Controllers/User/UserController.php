<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use App\Models\User;
use App\Models\Country;
use App\Models\Visitor;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\PurchasedPlan;
use Nexmo\Laravel\Facade\Nexmo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendEmailVerifivationNotification;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserBlock');
    }

    public function home()
    {
        $ip =  request()->ip();
        $guest = Visitor::where('ip', '=', $ip)->first();
        if ($guest == null) {
            $visitor = new Visitor();
            $visitor->ip = $ip;
            $visitor->save();
        }
        return view('welcome');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists',
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            $purchasedPlan = PurchasedPlan::where('user_id', '=', Auth::guard('web')->user()->id)->first();
            if ($purchasedPlan != null  && $purchasedPlan->status == 'Approved') {
                return redirect()->route('user.client.area')->with('success', 'SignIn Successfully');
            } else {
                return redirect()->route('user.plans')->with('success', 'SignIn Successfully');
            }
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function signup(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
//            'postal_or_zip_code' => ['required', 'regex:/^\d{5}$/'],
            'national_id' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'phone_code' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        if ($request->is_plus_eighteen) {
            if ($request->is_plus_eighteen == 'on') {
                $is_plus_eighteen = 1;
            }
        } else {
            $is_plus_eighteen = 0;
        }
        $email_verification_code = mt_rand(100000, 999999);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'region' => $request->region,
            'postal_or_zip_code' => $request->postal_or_zip_code,
            'is_plus_eighteen' => $is_plus_eighteen,
            'national_id' => $request->national_id,
            'email_verification_code' => $email_verification_code,
            'phone' => $request->phone_code . $request->phone,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        $user->notify(new SendEmailVerifivationNotification($email_verification_code));
        return redirect()->route('user.email.varify')->with(['message' => 'Email Verification Code Sent On Your Email, Please Check Your Email.']);
    }
    public function emailVerify()
    {
        return view('dashboard.user.emailverify');
    }

    public function checkEmailVerify(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'email_verification_code' => ['required', 'digits:6']
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user->email_verification_code == $request->email_verification_code) {
            $phone_verification_code = mt_rand(10000, 99999);
            Nexmo::message()->send(
                [
                    'to' => $user->phone,
                    'from' => 'investment',
                    'text' => 'Your OTP is' + $phone_verification_code + 'for email verification'
                ]
            );
            $user->varify_email = 1;
            $user->phone_verification_code = $phone_verification_code;
            $user->update();
            return redirect()->route('user.phone.varify')->with(['message' => 'Phone Verification Code Sent On Your Phone, Please Check Your Phone.']);
        } else {
            return redirect()->back()->with(['fail' => 'Your Code Does not Match, Pleas try again.']);
        }
    }

    public function phoneVerify()
    {
        return view('dashboard.user.phoneverify');
    }

    public function checkPhoneVerify(Request $request)
    {
        $request->validate([
            'number' => ['required', 'string'],
            'phone_verification_code' => ['required', 'digits:5']
        ]);
        $user = User::where('phone', '=', $request->number)->first();
        if ($user->phone_verification_code == $request->phone_verification_code) {
            $user->varify_phone = 1;
            $user->update();
            return redirect()->route('user.plans')->with('success', 'SignIn Successfully');
        } else {
            return redirect()->back()->with(['fail' => 'Your Code Does not Match, Pleas try again.']);
        }
    }

    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('index');
    }

    public function dashboard()
    {
        $purchasedPlan = PurchasedPlan::where('user_id', '=', Auth::guard('web')->user()->id)->first();
        $plans = Plan::all();
        $totalPlans = count($plans);
        if ($purchasedPlan->plan != Null){
            return redirect()->route('user.client.area');
        }

        return view('dashboard.user.home', compact('totalPlans'));
    }

    public function showRegisterForm()
    {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }

    public function profile()
    {
        $user = Auth::guard('web')->user();
        return view('dashboard.user.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $rules = array('first_name' => 'required|min:3|max:50', 'last_name' => 'required|min:3|max:50');
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
        }
        $id = $request->id;
        $profile = User::find($id);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        if ($request->hasfile('image')) {
            if (!empty($profile->image) && ($profile->image != "assets/images/userPic.png")) {
                $image_path = $profile->image;
                unlink($image_path);
            }
            $image = $request->file('image');
            $name = time() . 'profile' . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'user_images/';
            $image->move($destinationPath, $name);
            $profile->image = 'user_images/' . $name;
        }

        $profile->update();
        return response()->json([
            'success' => 'Profile Updated Successfully!',
        ]);
    }

    // refferalCode

    public function refferalCode()
    {
        $plans = PurchasedPlan::where('referral_code', '=', Auth::guard('web')->user()->refferal_code)->
        where('referral_payment_status', '=',  1)->get();
        $purchasedPlan = PurchasedPlan::where('user_id', '=', Auth::guard('web')->user()->id)->first();
        $commission = $purchasedPlan->plan->referral_commission;
        $refferalAmount = ($purchasedPlan->plan->price * $purchasedPlan->plan->referral_commission) / 100;
        return view('dashboard.user.refferalcode.show', compact('plans', 'commission', 'refferalAmount'));
    }
}
