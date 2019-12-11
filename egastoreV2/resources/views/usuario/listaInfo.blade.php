@extends('layouts.app')

@section('titulo')
    Información Personal
@endsection

@section('content')

<table class="table table-hover">
    <tr>
        <td>
        <th>Mi información personal</th>
        </td>
    </tr>
    <tr>
        <td>Nombre:</td>
        <td>{{$usuarios->name}}</td>
    </tr>
    <tr>
        <td>Apellido:</td>
        <td>{{$usuarios->apellido}}</td>
    </tr>
    <tr>
        <td>Tipo documento:</td>
        <td>{{$usuarios->tipo_documento}}</td>
    </tr>
    <tr>
        <td>Número documento:</td>
        <td>{{$usuarios->numero_documento}}</td>
    </tr>
    <tr>
        <td>Correo:</td>
        <td>{{$usuarios->email}}</td>
    </tr>
</table>

<table class="table table-hover">
        <tr>
            <td><a href="/usuario/{{$usuarios->id}}/edit" class="btn btn-warning">Editar</a> 
            </td>
        </tr>
    </table>


@endsection