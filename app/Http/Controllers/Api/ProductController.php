<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response(['data' => Product::get()]);
    }

    public function promo_section()
    {
        try {
            $products = ProductResource::collection(Product::limit(4)->get());
            return response(['success' => true, 'data' => $products]);
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
}
