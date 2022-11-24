<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'token' => $user->createToken($user->email)->accessToken
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email'
            ], 401);
        }
        if (Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'token' => $user->createToken($user->email)->accessToken
            ], 401);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid password'
        ], 401);
    }
}
