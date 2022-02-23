<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchasedPlan;
use App\Models\Visitor;
use App\Models\Withdrawal;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard.admin.login');
    }

    function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.dashboard')->with('success', 'Signing Successfully');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $plans = Plan::all();
        $totalPlans = count($plans);
        $totalUser = count(User::all());
        $totalWithdrawal = count(Withdrawal::all());
        $totalRequests = count(PurchasedPlan::all());
        $totalVisitors = count(Visitor::all());
        return view('dashboard.admin.home', compact('totalPlans', 'totalUser', 'totalWithdrawal', 'totalRequests', 'totalVisitors'));
    }

    public function profile()
    {
        return view('dashboard.admin.profile');
    }

    public function profileUpdate(Request $request)
    {
        if ($request->ajax()) {
            $rules = array('name' => 'required|min:3|max:50');
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }
            $id = $request->id;
            $profile = Admin::find($id);
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->wallet_address = $request->wallet_address;
            if ($request->hasfile('image')) {
                if (!empty($profile->image) && ($profile->image != "assets/images/adminPic.png")) {
                    $image_path = $profile->image;
                    unlink($image_path);
                }
                $image = $request->file('image');
                $name = time() . 'profile' . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'admin_images/';
                $image->move($destinationPath, $name);
                $profile->image = 'admin_images/' . $name;
            }

            $profile->update();
            return response()->json([
                'success' => 'Profile Updated Successfully!',
            ]);
        }
    }
    public function changepassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);


        $user = User::find(auth()->user()->id);

        $update = $user->update(['password'=> Hash::make($request->new_password)]);

        if ($update){
            return redirect()->route('admin.profile')->with('success', 'Password Updated Successfully');
        }
        else{
            return redirect()->route('admin.profile')->with('danger', 'Password not Updated ');
        }

    }

}
