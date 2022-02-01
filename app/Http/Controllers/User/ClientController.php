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
        $purchasedPlan = PurchasedPlan::where('user_id', '=', Auth::guard('web')->user()->id)
            ->where('status', '=', 'Approved')
            ->first();
        return view('dashboard.user.client.area', compact('purchasedPlan'));
    }

    public function withdrawal()
    {
        $paymentMethods = PaymentMethod::all();
        return view('dashboard.user.client.withdrawal', compact('paymentMethods'));
    }

    public function withdrawalStore(Request $request)
    {
        $request->validate([
            'available_balance' => 'required',
            'wallet_address' => 'required',
            'request_payment' => 'required',
            'payment_method' => 'required'
        ]);

        $withdrawal = new Withdrawal();
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
        return redirect()->back()->with($notification);
    }
}
