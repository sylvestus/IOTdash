<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        // dd($credentials);

        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful
            return response()->json(['success' => 'loged in you can now acess the Apis']);
        }

        // Authentication failed
        return response()->json(['failure' => 'Invalid login credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['success' => 'loged out']);
    }
}
