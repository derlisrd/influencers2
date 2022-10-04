<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index(){
        if(Auth::user()->type == '0')
        return redirect()->route('home');

        $datos = User::all();
        return view('Users.index',compact("datos"));
    }

    public function user_active($id){
        if(Auth::user()->type == '0')
        return redirect()->route('home');

        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return redirect()->route('users');
    }

    public function user_desactive($id){
        if(Auth::user()->type == '0')
        return redirect()->route('home');

        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return redirect()->route('users');
    }
}
