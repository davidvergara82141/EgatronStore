@extends('layouts.app')

@section('titulo')
    Inicio
@endsection

@section('content')
    <a href="/producto" class="btn btn-primary">Lista de productos</a>
    <a href="/publicaciones" class="btn btn-primary">Foro</a>
    <a href="/administrarUsuarios" class="btn btn-primary">Administrar Usuarios</a>
    <a href="/ventas" class="btn btn-primary">Revisar ventas</a>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
 
        <ol class="carousel-indicators">
         @foreach( $productos as $producto )
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
         @endforeach
        </ol>
       
        <div class="carousel-inner" role="listbox">
          @foreach( $productos as $producto )
             <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                 <img class="d-block img-fluid"  src="{{ Storage::url( $producto->imagen )}}" >
                    <div class="carousel-caption d-none d-md-block " style="background: rgba(0,0,0, .5);">
                       <h3>{{ $producto->nombre }}</h3>
                       <p >{!! substr(strip_tags($producto->descripcion), 0 ,100)!!}
                        {{strlen($producto->descripcion) > 100 ? "..." : ""}}</p>
                       
                    </div>
             </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
@endsection
