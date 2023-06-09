@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
    <h1 class="text-2xl font-semibold text-center">Images</h1>
    <a href="{{route('photos.create')}}" class="btn btn-primary">Add Image</a>
@stop

@section('content')
@foreach ($images as $image)
    <img src="{{asset ($image->url_image)}}" alt="Foto">
@endforeach
@stop
