<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\PurchasedPlan;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function clientArea()
    {
        $purchasedPlan = PurchasedPlan::where('user_id', '=', Auth::guard('web')->user()->id)->first();
        $withdraAmount = round(Withdrawal::where('user_id', '=', Auth::guard('web')->user()->id)->sum('request_payment'));
        $plans = PurchasedPlan::where('referral_code', '=', Auth::guard('web')->user()->refferal_code)->
        where('referral_payment_status', '=',  1)->get();

        $refferalAmount = ($purchasedPlan->plan->price * $purchasedPlan->plan->referral_commission) / 100;



        return view('dashboard.user.client.area', compact('purchasedPlan', 'withdraAmount', 'plans' , 'refferalAmount'));
    }

    public function withdrawal()
    {
        $paymentMethods = PaymentMethod::all();
        $withdrawals = Withdrawal::where('user_id', '=', Auth::guard('web')->user()->id)->where('status', '=', 'Approved')->get();
        $totalWithdrawals = count($withdrawals);


        $purchasedPlan = PurchasedPlan::where('user_id', '=', Auth::guard('web')->user()->id)->first();

        $profit = ($purchasedPlan->plan->price * $purchasedPlan->plan->commission) / 100;
        $totalDays = $purchasedPlan->plan->withdraw * 6;
        $dailyProfit = ($profit + $purchasedPlan->plan->price) / $totalDays;
//        $availabeAmountForWithdrawal = $dailyProfit * $purchasedPlan->plan->withdraw;
        $availabeAmountForWithdrawal = 0;
        $withdraAmount = round(Withdrawal::where('user_id', '=', Auth::guard('web')->user()->id)->sum('request_payment'));
        $refferalUser = count(PurchasedPlan::where('referral_code', '=', Auth::guard('web')->user()->refferal_code)->
        where('referral_payment_status', '=',  1)->get());

        $availabeBalanceForWithdrawal = round(($availabeAmountForWithdrawal + ($refferalUser * round(($purchasedPlan->plan->price * $purchasedPlan->plan->referral_commission) / 100)))) - $withdraAmount;
        return view('dashboard.user.client.withdrawal', compact('paymentMethods', 'totalWithdrawals', 'availabeBalanceForWithdrawal'));
    }

    public function withdrawalStore(Request $request)
    {
        $request->validate([
            'available_balance' => 'required',
            'wallet_address' => 'required',
            'request_payment' => 'required',
            'payment_method' => 'required'
        ]);

        if ($request->available_balance < $request->request_payment) {
            return redirect()->back()->with(['message' => 'Request Payment Should Be Less Then Available Balance']);
        }

        $withdrawal = new Withdrawal();
        $plans = PurchasedPlan::where('referral_code', '=', Auth::guard('web')->user()->refferal_code)->
        where('referral_payment_status', '=',  1)->get();
        $withdrawal->user_id = Auth::guard('web')->user()->id;
        $withdrawal->plan_id = 1;
        $withdrawal->available_balance = $request->available_balance;
        $withdrawal->wallet_address = $request->wallet_address;
        $withdrawal->request_payment = $request->request_payment;
        $withdrawal->payment_method = $request->payment_method;
        $withdrawal->save();
        $notification = array(
            'messege' => 'Submitted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);
    }
}
