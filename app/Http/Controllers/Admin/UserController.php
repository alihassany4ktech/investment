<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('dashboard.admin.user.all', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.user.show', compact('user'));
    }

    public function banUser($id)
    {
        $banUser = User::find($id);
        if ($banUser->status == 1) {
            $banUser->status = 0;
            $banUser->update();
            $notification = array(
                'messege' => 'User Banned Successfully',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'User Already Banned!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function unbanUser($id)
    {
        $banUser = User::find($id);
        if ($banUser->status == 0) {
            $banUser->status = 1;
            $banUser->update();
            $notification = array(
                'messege' => 'User Unbanned Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'messege' => 'User Already Unbanned!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'messege' => 'User Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
