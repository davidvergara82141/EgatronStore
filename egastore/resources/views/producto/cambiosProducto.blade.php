@extends('layouts.app')

@section('titulo')
    Lista de cambios
@endsection

@section('content')
    <a href="/producto/{{$prod->id}}" class="btn btn-secondary">Detalle Producto</a>
    <h1>Lista de cambios para: {{$prod->nombre}}</h1>
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <a href="{{route('cambio.nuevo',$prod->id)}}" class="btn btn-primary">Agregar Cambio</a>
    <table class="table"> 
        @if ($cambios->isEmpty())
            <p>No hay cambios para este producto</p>           
        @endif
        <thead>
            <th scope="col">Título</th>
        </thead>
        <tbody>
        </tbody>
         @foreach ($cambios as $cambio)
         <tr>
                
                <td>{{$cambio->titulo}}</td>
                <td><a href="/cambios/{{$cambio->id}}" class="btn btn-primary">Ver Más</a></td>

         </tr>
            
        @endforeach
    </table>
    
    
@endsection