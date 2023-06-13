@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 

    <a href="{{route('photos.create')}}" class="btn btn-primary">Add Image</a>
    @vite('resources/css/photos.css')
@stop

@section('content')
<div class="galeria">
    @foreach ($images as $image)
            <img src="{{asset ($image->url_image)}}" alt="Foto">
    @endforeach
</div>

@stop 
