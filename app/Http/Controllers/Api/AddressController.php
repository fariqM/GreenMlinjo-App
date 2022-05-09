<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response(['data' => Address::where('user_id', auth()->user()->id)->get()]);
    }
    public function store(Request $request)
    {
        // return response(array_merge($request->all(), ['choosen' => 0, 'user_id' => auth()->user()->id]));
        try {
            Address::create(array_merge($request->all(), ['choosen' => 0, 'user_id' => auth()->user()->id]));
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true]);
    }
}
