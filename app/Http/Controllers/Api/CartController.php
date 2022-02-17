<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function mycarts(Request $request)
    {
        try {
            $userid = $request->user()->id;
            $myCarts = Cart::where('user_id', $userid)->orderBy('created_at', 'desc')->get();
            return response(['success' => true, 'data' => CartResource::collection($myCarts)]);
        } catch (\Throwable $e) {
            return response(['success' => false, 'errors' => $e->getMessage()], 500);
        }
    }

    public function cartProducts()
    {
        try {
            $userid = Auth::user()->id;
            $cartProducts = DB::table('products')
                ->join('carts', 'products.id', '=', 'carts.product_id')
                ->join('images', 'products.id', '=', 'images.imageable_id')
                ->select('products.*', 'images.url', 'carts.id as cart_id', 'qty', )
                ->where('carts.user_id', '=', $userid)
                ->where('images.imageable_type', '=', 'App\Models\Product')->get();
            // $cartProducts = Cart::with('product.images')->where('user_id', $userid)->get();
            return response(['success' => true, 'data' => $cartProducts]);
        } catch (\Throwable $e) {
            return response(['success' => false, 'errors' => $e->getMessage()], 500);
        }
    }

    public function addcart(Request $request)
    {
        // return response(['req' => $request->all(), 'userid'=>$userid = $request->user()->id]);
        if (Auth::check()) {
            $userid = $request->user()->id;
            // Product::findOrFail($request->product_id);
            $isExist = Cart::where('user_id', $userid)->where('product_id', $request->product_id)->first();
            if ($isExist) {
                $cartId = $isExist->id;
                $isExist->update([
                    'product_id' =>  $isExist->product_id,
                    'user_id' =>  $isExist->user_id,
                    'qty' =>  $request->qty + $isExist->qty,
                ]);
                return response(['success' => true, 'message' => 'remove from cart', 'data' => $cartId], 200);
            } else {
                try {
                    $create = Cart::create([
                        'user_id' => $userid,
                        'product_id' => $request->product_id,
                        'qty' =>  $request->qty,
                    ]);
                    return response(['success' => true, 'message' => 'added to cart', 'data' => $create], 201);
                } catch (\Throwable $e) {
                    return response(['success' => false, 'errors' => $e->getMessage()], 500);
                }
                // return response(['success' => false, 'message bukan favorit', 'req' => $request->all()]);
            }
        } else {
            return response(['success' => false, 'message' => 'Unauthorized'], 401);
        }
    }
}
