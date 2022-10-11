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
            'tel'=>'required',
            'minimal_payment'=>'required|numeric|min:100',
            'raveshare'=>'numeric|max:100',
        ]);


        if($request->id){
            $setting = Setting::find($request->id);
        }else{
            $setting = new Setting();
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $destine = 'uploads/'.$user_id.'/';
            $filename = time() . '-'.$file->getClientOriginalName();
            $request->file('image')->move($destine,$filename);
            $urlImage = URL("")."/".$destine.$filename;
            $setting->image = $urlImage;
        }




        $setting->user_id = $user_id;
        $setting->name = $request->name;
        $setting->doc = $request->doc;
        $setting->tel = $request->tel;
        $setting->pix = $request->pix;
        $setting->raveshare = $request->raveshare;
        $setting->minimal_payment = $request->minimal_payment;
        $setting->save();

        return redirect()->route('setting')->with('msg', 'Atualizado');

    }
}
