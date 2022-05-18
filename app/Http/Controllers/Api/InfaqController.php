<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Infaq;
use Illuminate\Http\Request;

class InfaqController extends Controller
{
    public function infaq()
    {
        return response(['data' => Infaq::findOrFail(1)]);
    }

    public function addInfaq(Request $request)
    {
        $infaq = Infaq::findOrFail(1);
        try {
            $infaq->update([
                'collected' => $infaq->collected + $request->amount
            ]);
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true]);
    }
}
