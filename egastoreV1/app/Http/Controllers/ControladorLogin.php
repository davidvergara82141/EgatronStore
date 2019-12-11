<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

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
               return view('indexUser', compact('user'));
           }else{
               if ($user->tipo_usuario == 'Admin' && $user->estado == 'Activo') {
                return view('indexAdmin', compact('user'));
               }else{
                return back();
               }
           }
           
       }
       return back();
   }
}
