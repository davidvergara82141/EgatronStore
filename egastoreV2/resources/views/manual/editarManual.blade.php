@extends('layouts.app')

@section('titulo')
    Manual del producto
@endsection

@section('content')
<a href="/producto" class="btn btn-secondary">Lista de Productos</a>
<form action="/manual/editarManual/{{$manual[0]->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table table-hover">
        <tr>
            <td>Contenido:</td>
            <td><input type="file" name="contenido" id="contenido" required></td>
        </tr>
        <tr>
            <td>
                <input type="submit" class="btn btn-success" value="Actualizar">  
            </td>
        </tr>    
    </table>
    <table class="table table-hover">
        <tr>
            <td>Manual actual:</td>
            <tr>
                <td><a href="{{ Storage::url($manual[0]->contenido) }}" class="btn btn-info">Ver</a></td>
            </tr>
        </tr>
            
    </table>
    
@endsection
