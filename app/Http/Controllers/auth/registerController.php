<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class registerController extends Controller
{
    public function index(){
        return view('frontend.register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email',
            'password' => 'required|min:8|max:40|confirmed',
        ]);

        User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1])) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }
        // return back()->withErrors('something went wrong');

    }
}
