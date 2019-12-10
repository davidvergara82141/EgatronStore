@extends('layouts.app')

@section('titulo')
    Nuevo Producto
@endsection

@section('test')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({
    selector: 'textarea',
    init_instance_callback : function(editor) {
        var freeTiny = document.querySelector('.mce-notification');
        freeTiny.style.display = 'none';
    }
 
  });</script>
@endsection

@section('content')
    <a href="/producto" class="btn btn-secondary">Lista de Productos</a>
    @if ( session('mensaje') )
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif
    <form action="/producto" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-hover">
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" id="nombre" class="form-control" required></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td><textarea name="descripcion" id="descripcion" cols="30" rows="10"> </textarea></td>
            </tr>
            <tr>
                <td>Precio:</td>
                <td><div class="input-group">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="precio" id="precio" required>
                    <div class="input-group-append">
                      <span class="input-group-text">COL$</span>
                    </div>
                  </div></td>
            </tr>
            <tr>
                <td>Instalador:</td>
                <td><input type="file" name="instalador" id="instalador" required></td>
            </tr>
            <tr>
                <td>Imagen:</td>
                <td><input type="file" name="imagen" id="imagen" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-success" value="Publicar">  
                </td>
            </tr>    
        </table>
    </form>
    
@endsection
