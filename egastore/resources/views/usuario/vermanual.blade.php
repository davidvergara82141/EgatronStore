@extends('layouts.app')

@section('titulo')
    Manual del producto
@endsection

@section('content')
<a href="/usuario/listaproductos" class="btn btn-secondary">Lista productos</a>
@if ($manual->isEmpty())
    <div class="alert alert-warning">No hay manual para este producto</div>
@else
    <table class="table table-hover">
        <tr>
            <td>Manual actual:</td>
            <tr>
                <td><a href="{{ Storage::url($manual[0]->contenido) }}" class="btn btn-info">Ver</a></td>
            </tr>
        </tr>
            
    </table>
@endif
    
@endsection
