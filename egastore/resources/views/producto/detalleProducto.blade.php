@extends('layouts.app')

@section('titulo')
    Detalles: {{$producto->nombre}}
@endsection

@section('content')
<a href="/producto" class="btn btn-secondary">Lista productos</a>
@if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
    <table class="table table-hover">
        <tr>
            <td>Nombre:</td>
            <td>{{$producto->nombre}}</td>
        </tr>
        <tr>
            <td>Descripción:</td>
            <td>{!!$producto->descripcion!!}</td>
        </tr>
        <tr>
            
            <td>Precio:</td>
            <td>{{number_format($producto->precio, 2, ',', '.')}}&nbsp;COL</td>
        
        </tr>
        <tr>
            <td>Instalador:</td>
            <td><a href="{{ Storage::url($producto->instalador) }}" class="btn btn-info">Instalador</a></td>
        </tr>
            
    </table>
    
    <table class="table table-hover">
        <tr>
            <td><a href="/producto/{{$producto->id}}/edit" class="btn btn-warning">Editar</a> 
                <a href="/producto/{{$producto->id}}/cambios" class="btn btn-primary">Publicar Cambios</a>
                <form action="/producto/{{$producto->id}}" method="POST" class="d-inline" >
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
    </table>
    

@endsection

