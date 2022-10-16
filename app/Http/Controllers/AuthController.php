<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthorizeRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(AuthorizeRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('status', 'You have been logged in');
        }

        return redirect('/auth/login')->with('status', 'Login or password is wrong');
    }


    public function create(RegisterRequest $request){
        if ($request->password == $request->confirm_password) {       
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/auth/login')->with('status', 'Account created successfully');
        }

        return redirect('/auth/register')->with('status', 'Passwords do not match');
    }

    public function logout() {
        Auth::logout();

        return redirect('/')->with('status', 'Log out success');
    }
}
