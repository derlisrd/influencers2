<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Post;
use App\Models\Report;
use App\Models\Setting;
use App\Models\SocialNetwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index (){

        $user_id = Auth::id();

        if(Auth::user()->type=="0"){
            return redirect()->route("posts");
        }
        //$post_count = Post::where('user_id',$user_id)->count();
        $post_count = Post::all()->count();

        //$last_payment = Payment::where('user_id',$user_id)->where('status',1)->orderBy('updated_at', 'desc')->first();
        $last_payment = Payment::where('status',1)->orderBy('updated_at', 'desc')->first();
        $last_payment = $last_payment->amount ?? 0;

        $today = date('Y-m-d');
        //$today_report = Report::where('user_id',$user_id)->where('date',$today)->sum('revenue');
        $today_report = Report::where('date',$today)->sum('revenue');
        //$today_impressions = Report::where('user_id',$user_id)->where('date',$today)->sum('impressions');
        $today_impressions = Report::where('date',$today)->sum('impressions');

        //$last_posts = Post::where('user_id',$user_id)->orderBy('id', 'desc')->limit(5)->get();
        $last_posts = Post::orderBy('id', 'desc')->limit(5)->get();

        //$por_redes = SocialNetwork::where('user_id',$user_id)->get();
        $por_redes = SocialNetwork::all();
        $social_network_revenue = [];
        foreach($por_redes as $red){
            //$info = Report::where('user_id',$user_id)->where('criteria_value',$red->title)->sum('revenue');
            $info = Report::where('criteria_value',$red->title)->sum('revenue');
            array_push($social_network_revenue,[
                "title"=>$red->title,
                "revenue"=>$info
            ]);
        }



        $last_7_days = [];
        for($i=0;$i<=7;$i++){
            $date =  date('Y-m-d', strtotime("-$i days"));
            //$info = Report::where('user_id',$user_id)->where('date',$date)->sum('revenue');
            $info = Report::where('date',$date)->sum('revenue');
            array_push($last_7_days,$info);
        }
        $por_influencer = [];
        $users = User::where('type','0')->get();

        $setting = Setting::where('user_id',$user_id)->get()->first();
        if(!$setting){
            return redirect()->route("setting");
        }


        foreach($users as $user){
            $revenue_raw = Report::where('user_id',$user->id)->sum('revenue');



            $raveshare_join = $setting->raveshare_join;
            $raveshare_own = $setting->raveshare;

            $revenue_join = $revenue_raw * $raveshare_join / 100;


            $revenue_own  = ($revenue_raw - $revenue_join)  * $raveshare_own / 100;

            $revenue_influencer = ($revenue_raw - $revenue_join) - $revenue_own;

            array_push($por_influencer,[
                "name"=>$user->name,
                "raveshare"=>$raveshare_own . " %",
                "revenue"=>$revenue_own,
                "influencer"=>$revenue_influencer,
                "lucro"=>($revenue_own - $revenue_influencer)
            ]);
        }




        $data = [
            "today_values"=> $today_report ?? 0,
            "post_count"=>$post_count,
            "impressions"=>$today_impressions ?? 0,
            "last_payment"=>$last_payment,
            "last_posts"=>$last_posts,
            "por_redes"=>$por_redes,
            "last_7_days"=>array_reverse($last_7_days),
            "social_network_revenue"=>$social_network_revenue,
            "por_influencer"=>$por_influencer
        ];

        return view('Dashboard.index',$data);
    }
}
