@extends('layouts.app')

@section('titulo')
    Usuarios
@endsection

@section('content')
    <div class="d-flex justify-content-center">{{ $usuarios->links() }}</div>
    @if ( session('mensaje') )
     <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <table class="table">
        <thead class="thead-dark">
                <th scope="col">Id Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Estado</th>
                <th scope="col">Acción</th>
        </thead>
        <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{$usuario->id}}</th>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->estado}}</td>
                        <td><a href="administrarUsuarios/{{$usuario->id}}" class="btn btn-primary">Ver Más</a></td>
                    </tr>
                @endforeach
        </tbody>
        
    </table>

@endsection
