<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
class DomainController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
        $datos = Domain::where('user_id',$user_id)->get();
        return view('Domains.index',compact('datos'));
    }
    public function store(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'url'=>'required|unique:domains,url'
        ]);

        $user_id = Auth::id();
        $protocol =  "http://";
        if (request()->secure()) $protocol =  "https://";

        $url = $request->url;
        $url_http = $protocol.$url;
        $datos = ['user_id' => $user_id,'name'=>$request->name,'url'=>$url,'url_http'=>$url_http];
        $domain = Domain::create($datos);

        $URL = $url_http."/wp-content/plugins/mjcdd/json.php";
        $client = new Client();
        $response = $client->get($URL);
        $array = json_decode($response->getBody(),true);
        $datas = ($array['item']);
          foreach($datas as $d){
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
       return redirect()->route('domains');
    }



    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
