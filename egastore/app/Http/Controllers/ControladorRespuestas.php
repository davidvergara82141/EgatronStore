<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Publicacion;

class ControladorRespuestas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respuestaEliminar = Respuesta::findOrFail($id);
        $respuestaEliminar->delete();

        return back();
    }

    public function nuevaRespuesta($idPublicacion)
    {
        $publicacion = Publicacion::where('id', $idPublicacion)->get();

        return view('respuestas.nuevaRespuesta', compact('publicacion'));
    }
    public function guardarRespuesta(Request $request, $idPublicacion)
    {
       $respuesta = new Respuesta();
       $respuesta->titulo = $request->titulo;
       $respuesta->contenido = $request->contenido;
       $respuesta->id_usuario = auth()->user()->id;
       $respuesta->id_publicacion = $idPublicacion;

       $respuesta->save();  
       return back();
    }
}
