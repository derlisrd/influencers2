<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    public function register(Request $request){



        $validatedData = $request->validate([
            'name' => 'required',
            "username"=>'required|unique:users,username',
            'email' => 'email|unique:users,email',
            'password' => 'required'
        ]);

        if(empty($request->session()->get('user'))){
            $user = new User();
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }else{
            $user = $request->session()->get('user');
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }

        //User::create(request(['name','username','email', 'password']));
        return redirect()->route('register_step2');
       //return redirect()->route('login')->with('messageactive','Aguarde a ativaçao do seu usuario');
    }

    public function register_step2(Request $request)
    {
        $user = $request->session()->get('user');
        if($user){
            return view('Auth.registerstep2',compact('user'));
        }
        return redirect()->route('register');
    }



    public function register_step2_post(Request $request)
    {
        $user = $request->session()->get('user');

        $request->validate([
            'title' => 'required',
            'url'=>'required',
            'username'=>'required'
        ]);
        if($user){
            $newuser = User::create([
                'name'=>$user->name,
                'username'=>$user->username,
                'email'=>$user->email,
                'password'=> Hash::make( $user->password )
            ]);
            $titles = $request->title;
            $urls = $request->url;
            $users = $request->username;

            foreach($titles as $key=>$value){
                SocialNetwork::create([
                    "user_id"=>$newuser->id,
                    "title"=>$value,
                    "url"=>$urls[$key],
                    "username"=>$users[$key]
                ]);
            }
            return redirect()->route('login')->with('messageactive','Aguarde a ativaçao do seu usuario');
        }

        return redirect()->route('register');
    }
}
