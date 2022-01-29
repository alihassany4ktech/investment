<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\PurchasedPlan;
use App\Http\Controllers\Controller;
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
        return view('dashboard.user.client.withdrawal');
    }
}
