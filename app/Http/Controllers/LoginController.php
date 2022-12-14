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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $credentials['email'];
        $password = $credentials['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            $request->session()->regenerate();
            if(Auth::user()->type=="2")
            {
                return redirect()->route("raveshare_join");
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Os dados nao coinciden com nossos registros',
        ])->onlyInput('email');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

}
