@extends('layouts.app')

@section('titulo')
    Editar Mi Información
@endsection
@section('content')
<a href="/usuario" class="btn btn-secondary">Cancelar</a>
@if ( session('mensaje') )
<div class="alert alert-success">{{ session('mensaje') }}</div>
@endif

<form action="/usuario/{{$usuarios->id}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    
    <table class="table table-hover">
        <tr>
            <td>Nombre:</td>
            <td><input type="text" name="name" id="name" class="form-control" value = "{{$usuarios->name}}" required></td>
        </tr>
        <tr>
            <td>Apellido:</td>
            <td><input type="text" name="apellido" id="apellido" class="form-control" value = "{{$usuarios->apellido}}" required></td>
        </tr>
        <tr>
            <td>Tipo documento:</td>
            <td>
                        
                            <select name="tipo_documento" id="tipo_documento"  class="form-control{{ $errors->has('tipo_documento') ? ' is-invalid' : '' }}" name="tipo_documento" value="{{ old('tipo_documento') }}" required autofocus>
                                <option value="">{{$usuarios->tipo_documento}}</option>
                                <option value="cedula">Cédula</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="extrangeria">Cédula de extrangería</option>
                            </select>
                            @if ($errors->has('tipo_documento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo_documento') }}</strong>
                                </span>
                            @endif
                        
                </td>
        </tr>
        <tr>
            <td>Número documento:</td>
            <td><input type="text" name="numero_documento" id="numero_documento" class="form-control" value = "{{$usuarios->numero_documento}}" required></td>
        </tr>

            <td>
                <input type="submit" class="btn btn-success" value="Actualizar Datos">  
                <a href="/change-password" class="btn btn-danger">Cambiar contraseña</a>
            </td>
        </tr>    
    </table>
</form>



@endsection