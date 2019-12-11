@extends('layouts.app')

@section('titulo')
    Detalles: {{$producto->nombre}}
@endsection

@section('content')
<a href="/usuario/listaproductos" class="btn btn-secondary">Lista productos</a>
@if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
    <table class="table table-hover">
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
                      @if ($venta->isEmpty() && $compra->isEmpty())
                            <div class="alert alert-danger">No se registran compras para este producto, en caso de que sea un error, contacte con el administrador</div>
                        @else
                            Instalador:
                            <a href="{{ Storage::url($producto->instalador) }}" class="btn btn-info">Instalador</a>
                        @endif                    
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
           
            
        </tr>
            
    </table>
@endsection

