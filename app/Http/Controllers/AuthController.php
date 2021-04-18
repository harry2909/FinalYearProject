<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = User::whereEmail($request->email)->first()->createToken($request->email)->accessToken;

            return response()->json(['HarryTest', 'token' => $token]);
        } else {
            return response()->json(['test', 'email' => $request->email, 'password' => $request->password]);
        }
    }
}
