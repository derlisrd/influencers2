<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{
    public function index(){
        $type = Auth::user()->type;
        if($type == '2')
        {
            $dono = User::where('type','1')->first();
            $setting = Setting::where('user_id',$dono->id)->first();


            return view('Join.index',compact('setting'));
        }

        return redirect()->route('home');
    }

    public function store(Request $request){

        $request->validate([
            'raveshare_join' => ['required'],
        ]);

        $setting = Setting::find($request->id);

        $setting->raveshare_join = $request->raveshare_join;

        $setting->save();

        $guardado = true;

        return view('Join.index',compact('setting','guardado'));
    }
}
