<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;


class ControladorAdministracionUsuarios extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listar()
    {
        $usuarios = user::paginate(10);

        return view('usuarios.listadoUsuarios',compact('usuarios'));
    }

    public function verDetalles($id)
    {
        $usuario = user::findOrFail($id);
        
        return view ('usuarios.detallesUsuarios',compact('usuario'));
    }

    public function editarEstado($id)
    {
        $usuario = user::findOrFail($id);
        
        return view ('usuarios.editarEstadoUsuarios',compact('usuario'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $usuario = user::find($id);
        $usuario->estado = $request->estado;

        $usuario->save();
        
        return redirect()->route('usuarios.listar')->with('mensaje','Se cambió el estado del usuario: '.$usuario->email);
        
    }
}
