<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->tipo_usuario;
        if($user == "Admin"){
            $productos = Producto::All();
            return view('indexAdmin', compact('productos'));
        }
        $productos = Producto::All();
        return view('indexUser', compact('productos'));
    }

    
}
