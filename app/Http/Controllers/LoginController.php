<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email','password')))
        {
            $request->session()->regenerate();
            return redirect()->route('account')->with('status','Login successful');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records',
        ]);
    }
}
