<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
class LoginController extends Controller
{
    public function index(){
        return view('frontend.login');
    }


    public function authenticate(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (Auth::attempt($credential) && Auth::user()->is_admin == 1) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
