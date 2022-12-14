<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
        $datos = Auth::user()->type == '1' ?
        Materia::all()
        :
         Materia::where('user_id',$user_id)->get();
        return view('Materias.index',compact('datos'));
    }

    public function approve(Request $request){

        if(Auth::user()->type == '1'){

            $id = $request->id;
            $materia = Materia::find($id);
            $materia->status = 1;
            $materia->save();
        }

        return redirect()->route('materias');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $datos = [
            'title'=>$request->title,
            'description' => $request->description,
            'user_id'=>Auth::id(),
            'status'=>false
        ];
        Materia::create($datos);
        return redirect()->route('materias');

    }

    public function edit($id)
    {
        $dato = Materia::find($id);
        return view('Materias.edit', compact('dato'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $materia = Materia::find($request->id);
        $materia->title = $request->title;
        $materia->description = $request->description;
        $materia->update();
        return redirect()->route('materias');
    }


    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();
        return redirect()->route('materias');
    }
}
