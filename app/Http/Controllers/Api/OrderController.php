<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function makeOrder(Request $request)
    {


        $order = Order::find(1);
        $data = [
            1 => ['qty' => 3],
            2 => ['qty' => 1],
        ];
        $order->products()->attach($request->products);
        return response(['success' => true, 'data' => $data, 'req' => $request->products]);
    }
}
