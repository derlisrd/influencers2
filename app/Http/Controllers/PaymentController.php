<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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

        return view ('Payments.request');
    }
}
