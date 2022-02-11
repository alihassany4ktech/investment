<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PurchasedPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PlanRequestNotification;

class RequestController extends Controller
{
    public function requests()
    {
        $planRequests = PurchasedPlan::where('status', '!=', 'Approved')->get();
        return view('dashboard.admin.planrequest.all', compact('planRequests'));
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {

            $plan = PurchasedPlan::find($request->id);
            $plan->status = $request->status;
            $plan->referral_payment_status = 1;
            if ($request->status == 'Approved') {
                $currentDate = Carbon::now();
                $date = Carbon::parse($currentDate)->addDays($plan->plan->withdraw);
                $plan->countdown = $date;
            }
            $plan->update();
            if ($request->status == "Approved") {

                $user = User::find($plan->user_id);
                $refferal_code = '2EC' . $user->id . '-' . mt_rand(10000, 99999);
                $msg = 'And Your Refferal Code is ' . $refferal_code;
                $user->refferal_code = $refferal_code;
                $user->update();
                $message = 'Admin Approved Your Plan Purchase Request ';
            } elseif ($request->status == "Pending") {
                $msg = null;
                $message = 'Admin put Your Plan Purchase Request in pending';
            } else {
                $msg = null;
                $message = 'Admin Reject Your Plan Purchase Request.';
            }
            $user = Auth::guard('web')->user();
            $user->notify(new PlanRequestNotification($message, $msg));
            return response()->json(['success' => 'Status Changed Successfully!']);
        }
    }

    public function show($id)
    {
        $planRequest = PurchasedPlan::find($id);
        if ($planRequest->referral_code != Null) {
            $plans = PurchasedPlan::where('referral_code', '=', $planRequest->user->refferal_code)->get();
        }


        return view('dashboard.admin.planrequest.show', compact('planRequest'));
    }
}
