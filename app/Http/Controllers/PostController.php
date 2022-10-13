<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Post;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(){
        $user_id = Auth::id();

        $posts = Post::orderBy('id','DESC')->get();

        $links = SocialNetwork::all();
        return view('Posts.index',compact('posts','links'));
    }


    public function store_all_post(Request $request){
        $user_id = Auth::id();
        $domains = Domain::where('user_id',$user_id)->get();
        foreach($domains as $domain){
          $URL = $domain['url']. "/wp-content/plugins/mjcdd/json.php";
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => $URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          $response = curl_exec($curl);
          curl_close($curl);
          $array = json_decode($response,true);
          $datas = ($array['item']);
          foreach($datas as $d){
                $post = Post::where('user_id',$user_id)
                ->where('post_id',$d['id'])
                ->where('domain_id',$domain['id']);

                if($post->count()==0){
                $newpost = [
                    'user_id'=>$user_id,
                    'domain_id'=>$domain['id'],
                    'post_id'=>$d['id'],
                    'title'=>$d['title'],
                    'href'=>$d['link']['href'],
                    'image'=>$d['images']['url'],
                    'category'=>$d['category'],
                    'date'=>$d['date']['published']
                ];
                Post::create($newpost);
                }
            }
          }

    }
}
