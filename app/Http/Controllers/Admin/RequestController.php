<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchasedPlan;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function requests()
    {
        $planRequests = PurchasedPlan::all();
        return view('dashboard.admin.planrequest.all', compact('planRequests'));
    }

    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $plan = PurchasedPlan::find($request->id);
            $plan->status = $request->status;
            $plan->update();
            return response()->json(['success' => 'Status Changed Successfully!']);
        }
    }

    public function show($id)
    {
        $planRequest = PurchasedPlan::find($id);
        return view('dashboard.admin.planrequest.show', compact('planRequest'));
    }
}
