<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return response(['data' => Product::get()]);
    }

    public function promo_section()
    {
        try {
            $products =  Product::query()->limit(4)
                ->when(Auth::check(), function ($query) {
                    $query->with([
                        'favourites' => function ($hasMany) {
                            $hasMany->where('user_id', Auth::user()->id);
                        },
                        'images'
                    ]);
                })
                // will exclude all rows but flag the relation as loaded
                // and therefore add an empty collection as relation
                ->when(Auth::guest(), function ($query) {
                    $query->with([
                        'favourites' => function ($hasMany) {
                            $hasMany->whereRaw('1 = 0');
                        },
                        'images'
                    ]);
                })->get();

            return response(['success' => true, 'data' => ProductResource::collection($products)]);
        } catch (\Throwable $e) {
            return response(['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function package($id)
    {
        try {
            $products =  ProductResource::collection(Product::inRandomOrder()->limit(10)->get());
            return response(['success' => true, 'data' => $products]);
        } catch (\Throwable $e) {
            return response(['success' => false, 'errors' => $e->getMessage()]);
        }
    }

    public function paket_sedekah(){
        try {
            $product = Product::where('name', 'like', '%Empon%')->where('category_id', 1)->with('images')->get();
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()]);
        }

        return response(['success' => true, 'data' => $product]);
    }
}
