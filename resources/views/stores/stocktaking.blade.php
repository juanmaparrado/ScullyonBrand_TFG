@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
    <h1 class="text-2xl font-semibold text-center">Stocktaking</h1>
@stop

@section('content')
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($inventory as $item)
                    <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center">
                        <img src="{{ asset($item->product->images[0]->url_image) }}" alt="{{ $item->product->name }}" class="h-32 w-32 object-contain mb-4">                        <h2 class="text-lg font-semibold">{{ $item->product->name }}</h2>
                        <p class="text-gray-500 mb-2">{{ $item->product->description }}</p>
                        <p class="text-gray-700">{{ $item->product->price }}</p>
                        <span class="text-sm text-gray-500">Stock: {{ $item->product->stock }}</span>
                        <span class="text-sm text-gray-500">Status: {{ $item->status }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
@stop



