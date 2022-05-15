<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function getBalance(){
        return response(['success' => true, 'balance' => Balance::where('user_id', auth()->id())->firstOrFail(['balance'])]);
    }
}
