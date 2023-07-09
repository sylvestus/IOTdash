<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm(){
        return view('auth-signup');
    }

    public function register(Request $request){

        //
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'password' => 'required',
        ]);
        try {
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone_no = $validatedData['phone_no'];
            $user->password = Hash::make($validatedData['password']);
            $user->type_id=2;
            // $user->create_at = Carbon::now();

            // Save the updated user
            $user->save();
            Auth::login($user);

            return redirect()->route('home')->with('success', 'user registered successfully');
        } catch (\Exception $e) {


            return redirect()->route('login')->with('failure', 'user failed to register:  ' . $e->getMessage());
        }

    }
}
