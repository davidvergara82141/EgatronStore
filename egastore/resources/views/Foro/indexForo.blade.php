@extends('layouts.app')

@section('titulo')
    Foro
@endsection

@section('content')
    @if ($publicaciones->isEmpty())
    <div class="alert alert-warning">No hay publicaciones, <a href="publicaciones/create">haz una</a></div>
    @endif
    <a href="/publicaciones/create" class="btn btn-primary">Nueva Publicación</a>
    <div class="d-flex justify-content-center">{{ $publicaciones->links() }}</div>
    @foreach ($publicaciones as $publicacion)
    <div class="card">
        <div class="card-header">
          Publicación: {{$publicacion->id}}
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$publicacion->titulo}}</h5>
          <p class="card-text">{{ substr(strip_tags($publicacion->contenido), 0 ,100)}}
          {{strlen($publicacion->contenido) > 100 ? "..." : ""}}
          </p>
          <p>Creado el: {{$publicacion->created_at}}</p>
          <a href="/publicaciones/{{$publicacion->id}}" class="btn btn-primary">Ver Más</a>
        </div>
      </div>
    @endforeach
    <div class="d-flex justify-content-center">{{ $publicaciones->links() }}</div>
@endsection