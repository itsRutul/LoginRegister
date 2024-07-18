<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        if(!Auth::check())
        {
            return redirect()->route('login')->with('status','you need to login first');
        }
            return view('account');
    }

    public function update(Request $request){
        if(!Auth::check())
        {
            return redirect()->route('login')->with('status', 'you need to login first');
        }

        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email|max:255',

        ]);
        $user = Auth::user();
        $user -> update([
            'name'=> $request->name,
            'email'=> $request->email,
        ]);

        return redirect()->route('account')->with('status','Information updated successfully');
    }

    public function delete(Request $request){
        if(!Auth::check()) {
            return redirect()->route('login')->with('status', 'You need to login first');
        }

        $user = Auth::user();
        $user->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Account deleted successfully');
    }


    public function logout(Request $request){

        Auth::logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

}


