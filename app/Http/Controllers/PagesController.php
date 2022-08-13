<?php

namespace App\Http\Controllers;
use App\Http\Requests\NotasRequest;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PagesController extends Controller
{
    public function inicio(){
        $notas = Nota::all();
        return view('welcome', compact('notas'));
    }

    public function detalle($id){
        $nota = Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    public function crear(NotasRequest $request)
    {

        $notaNueva = new Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }
}
