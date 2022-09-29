<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected function credentials(Request $request)
    {
        return [
            'email' => request()->email,
            'password' => request()->password,
            'active' => 1
        ];
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(!Auth::user()->active) {
                Auth::logout();
                return redirect('login')->withErrors(['Sua conta esta inativa']);
            }
            return redirect()->route('home');
        }
        else{
           return redirect()->back()->withErrors(['msg' => 'Erros de credenciais']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
