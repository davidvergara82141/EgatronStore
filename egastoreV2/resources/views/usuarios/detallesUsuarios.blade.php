@extends('layouts.app')

@section('titulo')
   Administrando: {{$usuario->email}}
@endsection

@section('content')
<table class="table table-hover">
    <tr>
        <td>Nombre:</td>
        <td>{{$usuario->name}}</td>
    </tr>
    <tr>
        <td>Apellido:</td>
        <td>{{$usuario->apellido}}</td>
    </tr>
    <tr>
        
        <td>Correo:</td>
        <td>{{$usuario->email}}</td>
    
    </tr>
    <tr>
        <td>Estado:</td>
        <td>{{$usuario->estado}}</td>
    </tr>
        
</table>

<table class="table table-hover">
    <tr>
        <td><a href="/administrarUsuarios/editarEstado/{{$usuario->id}}" class="btn btn-warning">Cambiar Estado</a> 
            
        </td>
    </tr>
</table>
@endsection