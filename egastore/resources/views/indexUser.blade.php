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
                       <a href="/verProductoIndex/{{$producto->id}}">Ver Más</a>
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

