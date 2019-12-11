@extends('layouts.app')

@section('titulo')
    {{$producto->nombre}}
@endsection

@section('content')

<div class="container">
      <a href="/" class="btn btn-secondary">Atras</a>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="{{ Storage::url($producto->imagen) }}" alt="">
          <div class="card-body">
            <h3 class="card-title">{{$producto->nombre}}</h3>
            <h4>{{number_format($producto->precio, 2, ',', '.')}} 
            COP</h4>
            <p class="card-text">
                {!!$producto->descripcion!!}
            </p>
            
          </div>
          <a href="/producto/comprarProductoIndex/{{$producto->id}}" class="btn btn-success">Comprar</a>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Historial De Cambios
          </div>
          <div class="card-body">
              @if ($cambios->isEmpty())
              <small class="text-muted">Primera versión</small>
              @endif
              @foreach ($cambios as $cambio)
              <small class="text-muted">{{$cambio->titulo}}</small>
              <p>
                  {{$cambio->contenido}}
              </p>
              <small class="text-muted">Publicado el: {{$cambio->created_at}}</small>
              <hr>
              @endforeach
            
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
@endsection

