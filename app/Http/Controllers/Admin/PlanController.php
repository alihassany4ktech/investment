<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionContextPass;

class PlanController extends Controller
{
    public function plans()
    {
        $plans = Plan::all();
        return view('dashboard.admin.plan.all', compact('plans'));
    }

    public function create()
    {
        return view('dashboard.admin.plan.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'return_price' => 'required',
            'commission' => 'required',
            'daily_earning' => 'required',
            'withdraw' => 'required',
            'referral_commission' => 'required',
        ]);
        $plan = new Plan();
        $plan->title = $request->title;
        $plan->price = $request->price;
        $plan->return_price = $request->return_price;
        $plan->commission = $request->commission;
        $plan->daily_earning = $request->daily_earning;
        $plan->withdraw = $request->withdraw;
        $plan->referral_commission = $request->referral_commission;
        $plan->save();
        $notification = array(
            'messege' => 'Plan Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function show($id)
    {
        $plan = Plan::find($id);
        return view('dashboard.admin.plan.show', compact('plan'));
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('dashboard.admin.plan.edit', compact('plan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'return_price' => 'required',
            'commission' => 'required',
            'daily_earning' => 'required',
            'withdraw' => 'required',
            'referral_commission' => 'required',
        ]);
        $plan = Plan::find($request->id);
        $plan->title = $request->title;
        $plan->price = $request->price;
        $plan->return_price = $request->return_price;
        $plan->commission = $request->commission;
        $plan->daily_earning = $request->daily_earning;
        $plan->withdraw = $request->withdraw;
        $plan->referral_commission = $request->referral_commission;
        $plan->save();
        $notification = array(
            'messege' => 'Plan Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        $notification = array(
            'messege' => 'Plan Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
