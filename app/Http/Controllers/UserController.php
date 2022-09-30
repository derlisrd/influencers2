<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index(){
        if(Auth::user()->type == '0')
        {
            return redirect()->route('home');
        }
        return view('Users.index');
    }
}
