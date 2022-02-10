<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function myfavourite(Request $request)
    {
        try {
            $userid = $request->user()->id;
            $myfavourite = Favourite::where('user_id', $userid)->count();
            return response(['success' => true, 'data' => $myfavourite]);
        } catch (\Throwable $e) {
            return response(['success' => false, 'errors' => $e]);
        }
    }

    public function addfavourite(Request $request)
    {
        Product::findOrFail($request->product_id);
        try {
            $userid = $request->user()->id;
            Favourite::create([
                'user_id' => $userid,
                'product_id' => $request->product_id
            ]);
            return response(['success' => true]);
        } catch (\Throwable $e) {
            return response(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
}
