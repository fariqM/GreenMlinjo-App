<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function inspeksi(Request $req)
    {
        return response(['success' => true, 'client' => $req->user()]);
    }

    public function index()
    {
        return response(['data' => User::all()]);
    }

    public function login(Request $req)
    {
        $field = $req->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        //Check user
        $user = User::where('email', $field['email'])->first();
        if (!$user || !Hash::check($field['password'], $user->password)) {
            return \response([
                'message' => 'Bad creds',
            ], 401); //401 for unauthorization
        }
        $token = $user->createToken("$user->name _token")->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return \response($response, 201);
    }

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:120',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
            'phone' => 'required|max:13'
        ]);

        if ($validator->fails()) {
            return response(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $new_user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone' => $req->phone
        ]);

        Balance::create([
            'user_id' => $new_user->id,
            'balance' => 0
        ]);

        return response(['success' => true, 'login_form' => [
            'email' => $req->email,
            'password' => $req->password,
        ]]);
    }

    public function logout()
    {
        try {
            \auth()->user()->tokens()->delete();
        } catch (\Throwable $th) {
            return response(['success' => false, 'errors' => $th->getMessage()], 500);
        }
        return response(['success' => true]);
    }
}
