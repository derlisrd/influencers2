<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Post;
use App\Models\Report;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index (){

        $user_id = Auth::id();
        $post_count = Post::where('user_id',$user_id)->count();


        $last_payment = Payment::where('user_id',$user_id)->where('status',1)->orderBy('updated_at', 'desc')->first();
        $last_payment = $last_payment->amount ?? 0;

        $today = date('Y-m-d');
        $today_report = Report::where('user_id',$user_id)->where('date',$today)->sum('revenue');
        $today_impressions = Report::where('user_id',$user_id)->where('date',$today)->sum('impressions');

        $last_posts = Post::where('user_id',$user_id)->orderBy('id', 'desc')->limit(5)->get();

        $por_redes = SocialNetwork::where('user_id',$user_id)->get();
        $social_network_revenue = [];
        foreach($por_redes as $red){
            $info = Report::where('user_id',$user_id)->where('criteria_value',$red->title)->sum('revenue');
            array_push($social_network_revenue,[
                "title"=>$red->title,
                "revenue"=>$info
            ]);
        }


        $last_7_days = [];
        for($i=0;$i<=7;$i++){
            $date =  date('Y-m-d', strtotime("-$i days"));
            $info = Report::where('user_id',$user_id)->where('date',$date)->sum('revenue');
            array_push($last_7_days,$info);
        }


        $data = [
            "today_values"=> $today_report ?? 0,
            "post_count"=>$post_count,
            "impressions"=>$today_impressions ?? 0,
            "last_payment"=>$last_payment,
            "last_posts"=>$last_posts,
            "por_redes"=>$por_redes,
            "last_7_days"=>array_reverse($last_7_days),
            "social_network_revenue"=>$social_network_revenue
        ];

        return view('Dashboard.index',$data);
    }
}
