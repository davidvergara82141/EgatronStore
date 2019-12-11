@extends('layouts.app')

@section('titulo')
    Detalles Publicación
@endsection

@section('content')
    <!--<p class="card-text">{!!$publicacion->contenido!!}</p>-->
    <a href="/publicaciones" class="btn btn-secondary">Volver al Foro</a>
    <div class="card">
        <div class="card-header">
          Publicación: {{$publicacion->id}}
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$publicacion->titulo}}</h5>
          <p class="card-text">{!!$publicacion->contenido!!}
          </p>
          <p>Creado el: {{$publicacion->created_at}} por: {{$publicador[0]->name}}</p>
          <a href="/respuesta/nuevaRespuesta/{{$publicacion->id}}" class="btn btn-primary">Responder</a>
          @if (auth()->user()->tipo_usuario == "Admin")
          <form action="/publicaciones/{{$publicacion->id}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
              <input type="submit" class="btn btn-danger" value="Eliminar Publicación">
          </form>
            
          @endif
        </div>
      </div>

      @foreach ($respuestas as $respuesta)

      <div class="card">
        <div class="card-header">
          Respuesta
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$respuesta->titulo}}</h5>
          <p class="card-text">{!!$respuesta->contenido!!}
          </p>
          @if (auth()->user()->tipo_usuario == "Admin")
          <form action="/respuesta/eliminarRespuesta/{{$respuesta->id}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
              <input type="submit" class="btn btn-danger" value="Eliminar Respuesta">
          </form>
          @endif
        </div>
      </div>
          
      @endforeach
@endsection