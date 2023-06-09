@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
<h1 class="text-2xl font-semibold text-center">Edit Product</h1>
@stop

@section('content')
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ $product->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="text" name="price" id="price" class="form-input mt-1 block w-full" value="{{ $product->price }}">
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-input mt-1 block w-full" value="{{ $product->stock }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">description</label>
                        <input type="text" name="description" id="description" class="form-input mt-1 block w-full" value="{{ $product->description }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category ID</label>
                        <select name="category_id" id="category_id" class="form-select mt-1 block w-full" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success bg-green">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@stop
