<?php

namespace App\Http\Controllers;

use App\Models\Domain;
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
        $datos = ['user_id' => $user_id,'name'=>$request->name,'url'=>$request->url];

        Domain::create($datos);
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
