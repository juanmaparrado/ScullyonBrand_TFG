@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
    <h1 class="text-2xl font-semibold text-center">Upload Files</h1>
    @vite('resources/css/photos.css')
    @vite('resources/js/photos.js')
@stop

@section('content')
<x-app-layout>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="drag-area">
                        <div class="icon"><i class="fa fa-cloud-upload-alt"></i></div>
                        <span class="header">Drag & Drop</span>
                        <span class="header">or <span class="button">Browse</span></span> 
                        <span class="support">
                            Supported files: jpg, jpeg, png.
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary bg-blue">Subir</button>
            </form>
        </div>
    </div>
</x-app-layout>
@stop