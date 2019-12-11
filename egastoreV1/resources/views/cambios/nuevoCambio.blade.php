@extends('layouts.app')

@section('titulo')
    Nuevo Cambio
@endsection

@section('content')
    <h1>Publicar cambio nuevo para: {{$producto->nombre}}</h1>
    <form action="/cambio/nuevoCambio/{{$producto->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-hover">
            <tr>
                <td>Título:</td>
                <td><input type="text" name="titulo" id="titulo" class="form-control" required></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input type="text" name="contenido" id="contenido" class="form-control" required></td>
            </tr>
            <tr>
        </table>
        <input type="submit" class="btn btn-success" value="Crear">
    </form>
@endsection