@extends('layouts.app')

@section('titulo')
    Comprar: {{$producto->nombre}}
@endsection

@section('content')
    <a href="/home" class="btn btn-danger">Cancelar</a>
    
 <form method="post" action="/compra/confirmarCompra/{{$producto->id}}" class="form form-control">
    @csrf
    Correo comprador: <input type="text" name="correo" value="{{Auth::user()->email}}" class="form-control" readonly>
    Producto a comprar: <input type="text" name="producto" value="{{$producto->nombre}}" class="form-control" readonly>
    Precio: <input type="text" name="precio" value="{{number_format($producto->precio, 2, ',', '.')}} COP" class="form-control" readonly>
    <input type="submit" name="continuar" value="Continuar" class="btn btn-success">
  </form>
@endsection
