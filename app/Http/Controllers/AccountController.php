<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    public function profile(){
        $id = Auth::id();
        $user = User::find($id);
        return view('Accounts.profile',compact('user'));
    }

    public function profile_post(Request $request){
        return redirect()->back()->with('msg', 'Atualizado');
    }




}
