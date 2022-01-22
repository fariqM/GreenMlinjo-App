<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return response(['data' => User::all()]);
    }

    public function login(Request $req){
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

    public function logout()
    {
        \auth()->user()->tokens()->delete();
        return [
            'message' => 'Success Logged Out',
        ];
    }
}
