<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Producto;
Use App\Cambios;

class ControladorBienvenida extends Controller
{
    public function welcome()
    {   
        $productos = Producto::All();
        return view('welcome', compact('productos'));
    }

    public function verDetalles($id)
    {
        $producto = Producto::findOrFail($id);
        $cambios =  Cambios::where('id_producto', $id)->get();
        return view('verProductoIndex', compact('producto', 'cambios'));
    }

    public function comprarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        session(['comprar' => 'si']);
        session(['producto' => $producto]);

        return redirect()->action('ControladorProducto@comprarProducto',$id);
    }
}
