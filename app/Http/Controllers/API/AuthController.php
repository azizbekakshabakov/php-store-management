<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            return response('Email already exists', 401);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Created new user'
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (! $user) {
            return response('Email or password is invalid', 401);
        }

        if (Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'name' => $user->name,
                'token' => $user->createToken($user->email)->accessToken
            ]);
        }

        return response('Email or password is invalid', 401);
    }
}
