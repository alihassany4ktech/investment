<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\WithdrawalNotification;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function withdrawals()
    {
        $withdrawals = Withdrawal::all();
        return view('dashboard.admin.withdrawal.all', compact('withdrawals'));
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $plan = Withdrawal::find($request->id);
            $plan->status = $request->status;
            $plan->update();
            if ($request->status == "Approved") {
                $message = 'Admin Approved Your Withdrawal.';
            } elseif ($request->status == "Pending") {
                $message = 'Admin put  Your Withdrawal in pending';
            } else {
                $message = 'Admin Reject Your Withdrawal.';
            }
            $user = Auth::guard('web')->user();
            $user->notify(new WithdrawalNotification($message));
            return response()->json(['success' => 'Status Changed Successfully!']);
        }
    }
}
