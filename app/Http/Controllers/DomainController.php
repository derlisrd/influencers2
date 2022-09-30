<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user_id = Auth::id();
         $request->validate([
            'name'=>'required',
            'url'=>'required'
        ]);

        $url = $request->url;
        $url_http = "https://".$url;
        $datos = ['user_id' => $user_id,'name'=>$request->name,'url'=>$url,'url_http'=>$url_http];

       $domain = Domain::create($datos);



       return redirect()->route('domains');
    }

    public function getPost ($id){
        $domain = Domain::find($id);
        $user_id = Auth::id();
        $URL = $domain->url."/wp-content/plugins/mjcdd/json.php";
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
          print_r($array);
          /* $datas = ($array['item']);
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
            } */
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
