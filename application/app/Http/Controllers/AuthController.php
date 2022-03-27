<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt($request->only('username', 'password'))) {
            return to_route('login')->with('message', ['error', 'Username atau password salah']);
        }

        return to_route('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login')->with('message', ['success', 'Anda berhasil keluar']);
    }
}
