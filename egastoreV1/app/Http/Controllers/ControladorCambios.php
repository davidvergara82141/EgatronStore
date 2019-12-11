<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Cambios;

class ControladorCambios extends Controller
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
        return 'asds';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
       
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
        $cambio = Cambios::findOrFail($id);
        session(['link' => url()->previous()]);
        return view('cambios.detallesCambio', compact('cambio'));
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
        $cambioBorrar = Cambios::findOrFail($id);

        $cambioBorrar->delete();
        $link = session('link');
        return redirect()->away($link);
    }

    public function nuevoCambio($id)
    {
        $producto = Producto::findOrFail($id);

        return view('cambios.nuevoCambio',compact('producto'));
    }
    public function guardarCambio(Request $request, $id)
    {
        $prod = Producto::findOrFail($id);
        $cambio = new Cambios();
        $cambio->titulo = $request->titulo;
        $cambio->contenido = $request->contenido;
        $cambio->id_producto = $prod->id;

        $cambio->save();

        $cambios = Cambios::where('id_producto', $id)->get();
        return view('producto.cambiosProducto', compact('prod','cambios'))->with('mensaje', 'Se ha publicado un cambio para el producto');
    }
}
