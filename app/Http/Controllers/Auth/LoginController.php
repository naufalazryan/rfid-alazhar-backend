<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = $request->user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json(['message' => 'Berhasil masuk', 'user' => $user, 'token' => $token]);
        }

        throw ValidationException::withMessages([
            'error' => ['Email atau password tidak sesuai'],
        ]);
    }
}