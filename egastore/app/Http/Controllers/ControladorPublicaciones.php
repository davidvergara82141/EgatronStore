<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Respuesta;
use App\User;
use Auth;

class ControladorPublicaciones extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->estado != 'Activo')
        {
            return view('foro.baneado');
        }
        $publicaciones = Publicacion::paginate(10);

        return view('foro.indexForo', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foro.nuevaPublicacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publicacion = new Publicacion();
        $publicacion->titulo = $request->titulo;
        $publicacion->contenido = $request->contenido;
        $publicacion->id_usuario = auth()->user()->id;

        $publicacion->save();
        $publicaciones = Publicacion::paginate(10);
        return view('foro.indexForo', compact('publicaciones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $respuestas = Respuesta::where('id_publicacion', $publicacion->id)->get();
        $publicador = User::where('id', $publicacion->id_usuario)->get();

        return view('foro.detallesPublicacion',compact('publicacion','respuestas','publicador'));
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
        $publicacionEliminar = Publicacion::findOrFail($id);
        $respuestas = Respuesta::where('id_publicacion', $publicacionEliminar->id)->get(['id']);
        //dd($respuestas->toArray());
        Respuesta::destroy($respuestas->toArray());
        $publicacionEliminar->delete();
        
        $publicaciones = Publicacion::paginate(10);

        return view('foro.indexForo', compact('publicaciones'));
    }
}
