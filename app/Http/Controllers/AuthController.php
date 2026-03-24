<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            if (Auth::user()->role == 'customer') {
                return redirect('/customer');
            }
            return redirect('/dashboard');
        }

        return back()->with('failed', 'email atau password salah');
    }

     function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50|min:8',
            'confirm_password' => 'required|max:50|min:8|same:password',
        ]);
    
        $request['status'] = "verify";
        $user = User::create($request->all());
        Auth::login($user);
        return redirect('/customer');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}