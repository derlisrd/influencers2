<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index (){

        $user_id = Auth::id();
        $post_count = Post::where('user_id',$user_id)->count();

        $impressions = 1200;
        $last_payment = Payment::where('user_id',$user_id)->where('status',1)->orderBy('updated_at', 'desc')->first();
        $last_payment = $last_payment->amount ?? 0;

        $today = date('Y-m-d');
        $today_report = Report::where('user_id',$user_id)->where('date',$today)->sum('revenue');
        $today_impressions = Report::where('user_id',$user_id)->where('date',$today)->sum('impressions');

        $data = [
            "today_values"=> $today_report ?? 0,
            "post_count"=>$post_count,
            "impressions"=>$today_impressions ?? 0,
            "last_payment"=>$last_payment,

        ];

        return view('Dashboard.index',$data);
    }
}
