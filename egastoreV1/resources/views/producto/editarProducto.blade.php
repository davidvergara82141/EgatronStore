@extends('layouts.app')

@section('titulo')
    Editar: {{$producto->nombre}}
@endsection

@section('content')
<a href="/producto/{{$producto->id}}" class="btn btn-secondary">Cancelar</a>
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
<form action="/producto/{{$producto->id}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    
    <table class="table table-hover">
        <tr>
            <td>Nombre:</td>
            <td><input type="text" name="nombre" id="nombre" class="form-control" value = "{{$producto->nombre}}" required></td>
        </tr>
        <tr>
            <td>Descripción:</td>
            <td><input type="text" name="descripcion" id="descripcion" class="form-control" value = "{{$producto->descripcion}} " required></td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td><div class="input-group">
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="precio" id="precio" value = "{{$producto->precio}}" required>
                <div class="input-group-append">
                  <span class="input-group-text">COL$</span>
                </div>
              </div></td>
        </tr>
        <tr>
                <td>Instalador:</td>
                <td><a href="{{ Storage::url($producto->instalador) }}" class="btn btn-info">Instalador</a></td>
            </tr>
        <tr>
            <td>
                <input type="submit" class="btn btn-success" value="Actualizar Datos">  
            </td>
        </tr>    
    </table>
    <form action="/producto/{{$producto->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <table class="table table-hover">
               <thead>Actualizar Instalador</thead>
               <tbody>
                   <tr>
                       <td><input type="file" name="instalador" id="isntalador"></td>
                   </tr>
                   <tr>
                       <td><input type="submit" value="Actualizar Instalador" class="btn btn-success"></td>
                   </tr>
               </tbody>
        </table>
    </form>
</form>
@endsection