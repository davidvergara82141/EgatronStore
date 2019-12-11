@extends('layouts.app')

@section('titulo')
    Listado de Productos
@endsection

@section('content')
@if ($productos->isEmpty())
    <div class="alert alert-warning">No hay productos</div>
@endif
@if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
    <table class="table">
        <thead class="thead-dark">
                <th scope="col">Nombre Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acción</th>
                <th scope="col">Manual</th>
        </thead>
        <tbody>
                @foreach ($productos as $producto)
                    <tr> 
                        <td>{{$producto->nombre}}</td>
                        <td>{!! substr(strip_tags($producto->descripcion), 0 ,100)!!}
                            {{strlen($producto->descripcion) > 100 ? "..." : ""}}</td>
                        <td><a href="detalleproducto/{{$producto->id}}" class="btn btn-primary">Ver Más</a></td>
                        <td><a href="vermanual/{{$producto->id}}" class="btn btn-primary">Ver Manual</a></td>
                        
                    </tr>
                @endforeach
        </tbody>
        
    </table>
    
@endsection