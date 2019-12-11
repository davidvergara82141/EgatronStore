@extends('layouts.app')
@section('titulo')
    Mi perfil
@endsection

@section('content')
    <a href="/usuario" class="btn btn-primary">Ver Mi Información Personal</a>
    <a href="/publicaciones" class="btn btn-primary">Foro</a>
    <a href="/usuario/listaproductos" class="btn btn-primary">Lista de productos</a>
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
@endsection

