<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth-signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        // dd($credentials);

        if (Auth::attempt($credentials, $remember)) {
            // Authentication successful
            return redirect()->intended('/');
        }

        // Authentication failed
        return redirect()->back()->with(['failure' => 'Invalid login credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
