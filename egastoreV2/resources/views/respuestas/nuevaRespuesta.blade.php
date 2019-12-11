@extends('layouts.app')

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

@section('titulo')
    Nueva respuesta
@endsection

@section('content')
<a href="/publicaciones/{{$publicacion[0]->id}}" class="btn btn-secondary">Cancelar</a>
    <h1>Respondiendo a: {{$publicacion[0]->titulo}}</h1>
    <form action="/respuesta/guardarRespuesta/{{$publicacion[0]->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control" required>
        <textarea name="contenido"></textarea>
        <input type="submit" value="Publicar" class="btn btn-success">
        
    </form>
    
@endsection

