<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credential = $req->only('email', 'password');
        $user = User::where(['email'=>$req->email])->first();

        if(Auth::attempt($credential)){
            $req->session()->put('user', $user);
            Auth::login($user);
            return redirect('/');
        }
        return redirect()->back()->withErrors([
            'email' => "Wrong Email or Password"
        ]);
    }

}
