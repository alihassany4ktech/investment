<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

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
            return response()->json(['success' => 'Status Changed Successfully!']);
        }
    }
}
