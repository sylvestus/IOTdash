<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApiLogin extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $accessToken = $user->createToken('MyApp')->accessToken;
            return response()->json(['access_token' => $accessToken]);
        }

        return response()->json(['error' => 'Invalid login credentials'], 401);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        Auth::logout();

        return redirect()->route('login');
    }
}






