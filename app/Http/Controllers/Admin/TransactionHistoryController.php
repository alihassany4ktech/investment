<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionHistoryController extends Controller
{
    public function history()
    {
        $withdrawals = Withdrawal::where('status', '=', 'Approved')->get();
        return view('dashboard.admin.transaction.history', compact('withdrawals'));
    }
}
