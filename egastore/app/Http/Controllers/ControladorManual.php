<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manual;
use App\Producto;

class ControladorManual extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $manual=Manual::where('id_producto',$idproducto)->get();
        if($manual->isEmpty()){
        return view('manual.nuevoManual', compact('producto'));
        }
        else{
        return view('manual.editarManual', compact('manual'));
        }
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
        //
    }

    public function nuevoManual(Request $request, $idproducto)
    {
       $manual = new Manual();
       $manual->id_producto=$idproducto;
       $manual->contenido = $request->contenido->storeAs('public/Manuales', rand(1,1000)."-".$request->contenido->getClientOriginalName());
       $manual->save();  
       return back();
    }

    public function editarManual(Request $request, $id)
    {
       $manualactualizado=Manual::find($id);
       $manualactualizado->contenido = $request->contenido->storeAs('public/Manuales', rand(1,1000)."-".$request->contenido->getClientOriginalName());
       $manualactualizado->save();
       return back();
    }
}
