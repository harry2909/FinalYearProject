<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = User::whereEmail($request->email)->first()->createToken($request->email)->accessToken;

            return response()->json(['token' => $token]);
        } else {
            return response()->json(['email' => $request->email, 'password' => $request->password]);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $token = User::whereEmail($request->email)->first()->createToken($request->email)->accessToken;
            return response()->json(['token' => $token]);
        }
        else{
            return response()->json(null, 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
    }
}
