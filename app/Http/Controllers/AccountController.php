<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profile_password(Request $request){

        return view('Accounts.password');
    }

    public function profile_password_post(Request $request){
                # Validation
                $request->validate([
                    'old_password' => 'required',
                    'new_password' => 'required|confirmed',
                ]);


                #Match The Old Password
                if(!Hash::check($request->old_password, auth()->user()->password)){
                    return back()->with("error", "Old Password Doesn't match!");
                }


                #Update the new Password
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);

                return back()->with("status", "Password changed successfully!");


    }




}
