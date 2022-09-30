<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index (){

        $user_id = Auth::id();
        $post_count = Post::where('user_id',$user_id)->count();

        $impressions = 1200;
        $last_payment = 400;
        $data = [
            "today_values"=>"320 USS",
            "post_count"=>$post_count,
            "impressions"=>$impressions,
            "last_payment"=>$last_payment,

        ];

        return view('Dashboard.index',$data);
    }
}
