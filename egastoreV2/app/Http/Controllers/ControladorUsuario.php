<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Manual;
use App\Compra;
use App\Venta;
use App\Cambios;

class ControladorUsuario extends Controller
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
        $usuarios = Auth::user();
        return view('usuario.listaInfo', compact('usuarios'));
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
        $usuarios = Auth::user();
        return view('usuario.editarUsuario', compact('usuarios'));
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
        $usuarioactualizado = Auth::user();
        $usuarioactualizado->name = $request->name;
        $usuarioactualizado->apellido = $request->apellido;
        $usuarioactualizado->tipo_documento = $request->tipo_documento;
        $usuarioactualizado->numero_documento = $request->numero_documento;
        $usuarioactualizado->save();
        return back()->with('mensaje','Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listaproductos()
    {
        $productos = Producto::All();
        return view('usuario.listaproductos', compact('productos'));
    }

    public function detalleproducto($id)
    {
        $producto = Producto::findOrFail($id);
        $compra = Compra::where([
            ['id_usuario',Auth::user()->id],
            ['id_producto',$producto->id],
            ['estado', 'Confirmada'],
            ])->get();
        $venta = Venta::where([
            ['id_usuario',Auth::user()->id],
            ['id_producto', $producto->id],
            ['estado', 'Aprobada'],
            ])->get();
            $cambios =  Cambios::where('id_producto', $id)->get();
        return view('usuario.detalleproducto', compact('producto','compra', 'venta','cambios'));
    }

    public function vermanual($id)
    {
        $manual=Manual::where('id_producto',$id)->get();
        return view('usuario.vermanual', compact('manual'));
    }


    
}
