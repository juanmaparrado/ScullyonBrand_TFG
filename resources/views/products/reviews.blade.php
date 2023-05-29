@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
<h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('Review del producto') }} - {{ $product->name }}
</h1>
@stop

@section('content')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($reviews as $review)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ $review->title }}</h3>
                            <h5>{{ $review->user->name }} </h5> 
                            <i><p>{{$review->user->email}}</p></i>
                            <p class="text-gray-500">{{ $review->body }}</p>
                            <b><p class="text-gray-600"> {{$review->created_at}}</p> </b>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@stop
