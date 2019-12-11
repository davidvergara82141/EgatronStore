<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Cambios;

class ControladorProducto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productos = Producto::All();
        
        return view('producto.listaProducto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.nuevoProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->instalador = $request->instalador->storeAs('public/Instaladores', rand(1,1000)."-".$request->instalador->getClientOriginalName());
        $producto->imagen = $request->imagen->storeAs('public/Imagenes', rand(1,1000)."-".$request->imagen->getClientOriginalName());
        $producto->save();
        
        return back()->with('mensaje', 'Se ha publicado un nuevo producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.detalleProducto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        //return $producto;
        return view('producto.editarProducto', compact('producto'));
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
        $productoActualizado = Producto::find($id);
        //return dd($request);
        if(!$request->has('instalador')){
            //return 'No instalador';
            $productoActualizado->nombre = $request->nombre;
            $productoActualizado->descripcion = $request->descripcion;
            $productoActualizado->precio = $request->precio;
    
            $productoActualizado->save();
            return back()->with('mensaje','Detalles de producto actualizados');
        }else{
           // return 'Instalador';
            $productoActualizado->instalador = $request->instalador->storeAs('public/Instaladores', rand(1,1000)."-".$request->instalador->getClientOriginalName());
           
            $productoActualizado->save();
            return back()->with('mensaje','Instalador del producto actualizado');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productoBorrar = Producto::findOrFail($id);

        $productoBorrar->delete();
        if($productoBorrar){
            $productos = Producto::All();
        
        return view('producto.listaProducto', compact('productos'))->with('mensaje', 'Producto eliminado correctamente.');
        }else{
            return back()->with('mensaje', 'El producto no se ha podido eliminar.');
        }
        
    }

    public function listaCambios($id)
    {
        $prod = Producto::findOrFail($id);
        $id = $prod->id;
        $cambios = Cambios::where('id_producto', $id)->get();
        
        return view('producto.cambiosProducto',compact('prod','cambios'));
    }
}
