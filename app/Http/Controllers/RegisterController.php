<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
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


       $user = User::create(request(['name','username','email', 'password']));

        $user_id = $user->id;


        foreach($request->title as $key => $value){

            $social = new SocialNetwork();
            $social->url = $request->url[$key];
            $social->title = $value;
            $social->username = $request->username[$key];
            $social->user_id = $user_id;
            $social->save();


        }



       return redirect()->route('login')->with('msg','Aguarde a ativaçao do seu usuario');
    }
}
