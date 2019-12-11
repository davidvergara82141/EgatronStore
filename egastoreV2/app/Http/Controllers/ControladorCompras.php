<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\User;
use App\Compra;
use App\Venta;
use Carbon\Carbon;
use Auth;


class ControladorCompras extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirmarCompra(Request $request,$id)
    {
        $producto = Producto::findOrFail($id);

        return view('compras.confirmadaCompra', compact('producto'));
    }

    public function realizarCompra(Request $request, $id)
    {
       
        $producto = Producto::findOrFail($id);
        $compra = new Compra();
        $venta = new Venta();

        
        $compra->medio_pago = 'TarjetaCredito';
        $compra->estado = 'Confirmada';
        $compra->id_usuario = Auth::user()->id;
        $compra->id_producto = $producto->id;
        $compra->cantidad_pago = number_format($producto->precio, 2, ',', '.');

        $venta->precio = number_format($producto->precio, 2, ',', '.');
        $venta->estado = 'Aprovada';
        $venta->id_usuario = Auth::user()->id;
        $venta->id_producto = $producto->id;

        $venta->save();
        $compra->save();

        return redirect()->route('home')->with('mensaje','Se ha comprado el producto: '.$producto->nombre.' Ya puede descargar
        el instalador de la sección: Mis compras');

    }
}
