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
    Nueva Publicación
@endsection

@section('content')
    <h1>Nueva publicación</h1>
    <form action="/publicaciones" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control">
        <textarea name="contenido"></textarea>
        <input type="submit" value="Publicar" class="btn btn-success">
        
    </form>
    
@endsection


