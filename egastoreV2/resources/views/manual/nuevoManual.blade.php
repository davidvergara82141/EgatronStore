@extends('layouts.app')

@section('titulo')
    Nuevo Manual
@endsection

@section('content')
    <a href="/producto" class="btn btn-secondary">Lista de Productos</a>
    <form action="/manual/nuevoManual/{{$producto->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-hover">
            <tr>
                <td>Contenido:</td>
                <td><input type="file" name="contenido" id="contenido" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-success" value="Publicar">  
                </td>
            </tr>    
        </table>
    </form>
    
    
@endsection
