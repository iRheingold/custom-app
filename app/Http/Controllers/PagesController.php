<?php

namespace App\Http\Controllers;
use App\Http\Requests\NotasRequest;
use App\Models\Nota;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
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

    public function editar($id){
        $nota = Nota::findOrFail($id);
        return view('notas.editar',compact('nota'));
    }
    public function update(Request $request, $id){
        $notaActual = Nota::find($id);
        $notaActual->nombre = $request->nombre;
        $notaActual->descripcion = $request->descripcion;
        $notaActual->save();
        return back()->with('mensaje', 'Nota editada');

    }

}
