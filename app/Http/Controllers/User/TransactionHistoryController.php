<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionHistoryController extends Controller
{
    public function history()
    {
        $withdrawals = Withdrawal::where('user_id', '=', Auth::guard('web')->user()->id)->where('status', '=', 'Approved')->get();
        return view('dashboard.user.transaction.history', compact('withdrawals'));
    }
}
