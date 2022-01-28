<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            return redirect()->route('admin.dashboard');
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
        return view('dashboard.admin.home');
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
}
