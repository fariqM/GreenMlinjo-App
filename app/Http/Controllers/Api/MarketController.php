<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index(){
        $markets = Market::get();
        return response(['success' => true, 'data' => $markets]);
    }
}
