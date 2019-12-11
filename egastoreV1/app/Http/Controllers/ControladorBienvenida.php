<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Producto;

class ControladorBienvenida extends Controller
{
    public function welcome()
    {   
        $productos = Producto::All();
        return view('welcome', compact('productos'));
    }
}
