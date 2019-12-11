@extends('layouts.app')

@section('titulo')
    Listado de Productos
@endsection

@section('content')
<a href="producto/create" class="btn btn-success">Producto nuevo</a>
@if ($productos->isEmpty())
    <div class="alert alert-warning">No hay productos, <a href="producto/create">crea uno nuevo</a></div>
@endif
@if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
    <table class="table">
        <thead class="thead-dark">
                <th scope="col">Id Producto</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acción</th>
        </thead>
        <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <th scope="row">{{$producto->id}}</th>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td><a href="producto/{{$producto->id}}" class="btn btn-primary">Ver Más</a></td>
                    </tr>
                @endforeach
        </tbody>
        
    </table>
    
@endsection