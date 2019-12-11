@extends('layouts.app')

@section('titulo')
    Detalles
@endsection

@section('content')
<a href="{{url()->previous()}}" class="btn btn-secondary">Lista De Cambios</a>

    <h1>Más detalles</h1>
    <table class="table">
        <tr>
            <td>Título: {{$cambio->titulo}}</td>
        </tr>
        <tr>
            <td>Descripción: {{$cambio->contenido}}</td>
        </tr>
    </table>
    <form action="/cambios/{{$cambio->id}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection