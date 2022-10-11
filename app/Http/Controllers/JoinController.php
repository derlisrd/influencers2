<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{
    public function index(){
        $type = Auth::user()->type;
        if($type == '2')
        {

            return view('Join.index');
        }

        return redirect()->route('home');
    }
}
