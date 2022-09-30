<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SocialNetwork;
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


    public function socialnetworks(){
        $user_id = Auth::id();
        $datos = SocialNetwork::where('user_id',$user_id)->get();
        return view('Accounts.socialnetworks',compact('datos'));
    }

    public function socialnetworks_create(){
        return view('Accounts.socialnetworks_create');
    }
    public function socialnetworks_store (Request $request){
        $request->validate([
            'title'=>'required',
            'url'=>'required',
            'username'=>'required'
        ]);
        $user_id = Auth::id();
        $datos= [
            "title"=>$request->title,
            "url"=>$request->url,
            "username"=>$request->username,
            "user_id"=>$user_id
        ];
        if(SocialNetwork::create($datos)){
            return redirect()->route('socialnetworks');
        }
        return redirect()->back();
    }



    public function socialnetworks_edit(Request $request){
        $dato = SocialNetwork::find($request->id);
        return view('Accounts.socialnetworks_edit',compact('dato'));
    }



    public function socialnetworks_update(Request $request){
        $request->validate([
            'title'=>'required',
            'url'=>'required',
            'username'=>'required'
        ]);
        $social = SocialNetwork::find($request->id);
        $social->title = $request->title;
        $social->url = $request->url;
        $social->username = $request->username;
        $social->save();
        return redirect()->route('socialnetworks');
    }


}
