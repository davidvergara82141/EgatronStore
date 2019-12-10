@extends('layouts.app')

@section('titulo')
    Listado de Ventas
@endsection

@section('content')
@if ($productos->isEmpty())
    <div class="alert alert-warning">No hay productos</div>
@endif
@if ($collection->isEmpty())
    <div class="alert alert-warning">No se han realizado ventas</div>
@endif
<a href="/home" class="btn btn-secondary">Volver</a>
    <table class="table">
        <thead class="thead-dark">
                <th scope="col">Nombre producto</th>
                <th scope="col">Ventas realizadas</th>
        </thead>
        <tbody>
                @foreach ($productos as $pro)

                   @foreach ($collection as $col)
                    @if ($col->id_producto==$pro->id)
                    <tr>
                        <td>{{$pro->nombre}}</td>
                        <td>{{$col->total}}</td>
                    </tr>
                    @endif
                   @endforeach
                @endforeach

        </tbody>
        
    </table>
    
@endsection