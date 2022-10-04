<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $datos = Payment::where("user_id",$user_id)->get();
        return view('Payments.index',compact('datos'));
    }

    public function payment_request (){

        $user_id = Auth::id();

        $setting = Setting::where("user_id",$user_id);

        if($setting->count()<1){
            return view ('Payments.requestfail');
        }



        return view ('Payments.request');
    }
}
