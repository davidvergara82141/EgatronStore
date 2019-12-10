@extends('layouts.app')

@section('titulo')
   Cambiar estado: {{$usuario->email}}
@endsection

@section('content')
<a href="/administrarUsuarios/{{$usuario->id}}" class="btn btn-danger">Cancelar</a>
    <form action="/administrarUsuarios/actualizarEstado/{{$usuario->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="alert alert-warning">El estado actual del usuario es: {{$usuario->estado}}</a></div>

        <label for="estado">Estado Usuario</label>
        <select name="estado" id="estado" class="form-control">
            <option value="Activo" selected>Habilitar</option>
            <option value="Baneado">Banear</option>
            <option value="Bloqueado">Bloquear</option>
        </select>
        <input type="submit" value="Actualizar" class="btn btn-success">
    </form>
@endsection