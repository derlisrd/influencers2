<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialNetworkController extends Controller
{

    public function socialnetworks(){
        $user_id = Auth::id();
        $datos = SocialNetwork::where('user_id',$user_id)->get();
        return view('SocialNetworks.socialnetworks',compact('datos'));
    }

    public function socialnetworks_create(){
        return view('SocialNetworks.socialnetworks_create');
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
        return view('SocialNetworks.socialnetworks_edit',compact('dato'));
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
