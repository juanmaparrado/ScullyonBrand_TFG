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
            <form action="{{route('photos.destroy', $image->id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$image->id}}">
                <button type="submit" style="border: none; color:red"><i class="fa fa-trash"></i></button>
            </form>  
    @endforeach
</div>

@stop 
