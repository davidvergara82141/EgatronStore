<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
Use App\Producto;

class ControladorLogin extends Controller
{
   public function login(Request $request)
   {
       if(Auth::attempt([
           'email' => $request->email,
           'password' => $request->password
       ]))
       {
           $user =  User::where('email', $request->email)->first();
           if($user->tipo_usuario == 'Usuario' && $user->estado == 'Activo')
           {
               
               if($request->session()->has('comprar'))
               {
                    $comprar = $request->session()->get('comprar');
                    $producto = $request->session()->get('producto');
                    $id = $producto->id;
                    if($comprar == 'si'){               
                        return redirect()->away('/producto/comprarProducto/'.$id);          
                    }
               }
               $productos = Producto::All();

               return view('indexUser', compact('user','productos'));
           }else{
               if ($user->tipo_usuario == 'Admin' && $user->estado == 'Activo') {
                $productos = Producto::All();
                return view('indexAdmin', compact('user','productos'));
               }else{
                return back();
               }
           }
           
       }
       return back();
   }
}
