<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    public function register(Request $request){

        $this->validate(request(), [
            'name' => 'required',
            "username"=>'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required'
        ]);


       User::create(request(['name','username','email', 'password']));

       return redirect()->route('login');
    }
}
