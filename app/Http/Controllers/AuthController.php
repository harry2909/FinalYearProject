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
            $token = User::whereEmail($request->email)->first()
                ->createToken($request->email)->accessToken;
            return response()
                ->json(['success', 'token' => $token]);
        } else {
            return response()
                ->json(['failed', 'email' => $request->email, 'password' => $request->password]);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = User::whereEmail($request->email)
                ->first()->createToken($request->email)->accessToken;
            return response()
                ->json(['success', 'email' => $credentials['email'], 'token' => $token], 200);
        } else {
            return response()->json(null, 401);
        }
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!$validator) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = User::whereEmail($user->email)
            ->first()->createToken($user->email)->accessToken;
        return response()
            ->json(['success', 'name' => $user->name, 'token' => $token], 200);
    }

    public function showDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }
}
