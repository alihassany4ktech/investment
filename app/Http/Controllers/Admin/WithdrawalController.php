<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchasedPlan;
use App\Notifications\WithdrawalNotification;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function withdrawals()
    {
        $withdrawals = Withdrawal::where('status', '!=', 'Approved')->get();
        return view('dashboard.admin.withdrawal.all', compact('withdrawals'));
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $plan = Withdrawal::find($request->id);
            $plan->status = $request->status;
            $plan->update();
            $purchasedPlan = PurchasedPlan::where('user_id', '=', $plan->user->id)->first();
            $withdrawals = Withdrawal::where('user_id', '=', $plan->user->id)->where('status', '=', 'Approved')->get();
//            $referral_amount_status = PurchasedPlan::where('referral_code', '=', $plan->user->id->refferal_code)->
//            where('referral_payment_status', '=',  1)->get();
//            $referral_amount_status->referral_payment_status =  0;
//            $referral_amount_status->update();
            $totalWithdrawals = count($withdrawals);
            if ($totalWithdrawals == 6) {
                $purchasedPlan->status = 'Pending';
                $purchasedPlan->update();
            }
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
