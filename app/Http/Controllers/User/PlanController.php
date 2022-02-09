<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\PurchasedPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function plans()
    {
        $plans = Plan::all();
        return view('dashboard.user.plan.all', compact('plans'));
    }

    public function purchase($id)
    {
        $plan = Plan::find($id);
        return view('dashboard.user.plan.purchase', compact('plan'));
    }

    public function purchaseStore(Request $request)
    {
        $request->validate([

            'transaction_url' => 'required',
            'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4098',
            'term_and_condition' => 'required'
        ]);
        $addproved = PurchasedPlan::where('user_id', '=', Auth::user()->id)->where('status', 'Approved')->exists();
        if ($addproved == true) {
            $notification = array(
                'messege' => 'Already Purchased',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $purchasedPlan = new PurchasedPlan();
            $purchasedPlan->user_id = Auth::guard('web')->user()->id;
            if ($request->price) {
                $purchasedPlan->price = $request->price;
            }
            $purchasedPlan->plan_id = $request->plan_id;
            $purchasedPlan->wallet_address = $request->wallet_address;
            $purchasedPlan->transaction_url = $request->transaction_url;
            $purchasedPlan->referral_code = $request->referral_code;
            if ($request->term_and_condition) {
                $purchasedPlan->term_and_condition = 1;
            } else {
                $purchasedPlan->term_and_condition = 0;
            }

            if ($request->hasfile('screenshot')) {
                $plan_screenshot = $request->file('screenshot');
                $name = time() . 'screenshot' . '.' . $plan_screenshot->getClientOriginalExtension();
                $destinationPath = 'plan_screenshot/';
                $plan_screenshot->move($destinationPath, $name);
                $purchasedPlan->screenshot = 'plan_screenshot/' . $name;
            }

            $purchasedPlan->save();
            return redirect()->route('user.plan.purchase.success');
        }
    }

    public function planPurchaseSuccess()
    {
        return view('dashboard.user.plan.success');
    }
}
