<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function setting (){
        $user_id = Auth::id();
        $data = Setting::where("user_id",$user_id)->get()->first();
        return view ('Accounts.setting',compact('data'));
    }

    public function setting_store (Request $request){

        $user_id = Auth::id();
         $request->validate([
            'name'=>'required',
            'doc'=>'required',
            'pix'=>'required',
            'minimal_payment'=>'required|numeric|min:100',
            'raveshare'=>'numeric|max:100',
        ]);

        if($request->id){
            $setting = Setting::find($request->id);
        }else{
            $setting = new Setting();
        }
        $setting->user_id = $user_id;
        $setting->name = $request->name;
        $setting->doc = $request->doc;
        $setting->pix = $request->pix;
        $setting->raveshare = $request->raveshare;
        $setting->minimal_payment = $request->minimal_payment;
        $setting->save();

        return redirect()->route('setting')->with('msg', 'Atualizado');

    }
}
