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

    public function chooseAddress(Address $address)
    {
        try {
            if ($address->choosen == 0) {
                Address::where('user_id', auth()->user()->id)->update(['choosen' => 0]);
                $address->update(['choosen' => 1]);
            }
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true]);
    }

    public function getChoosenAddress()
    {
        $data = Address::where('user_id', auth()->user()->id)->where('choosen', 1)->firstOrFail();
        return response(['success' => true, 'data' => $data]);
    }
}
