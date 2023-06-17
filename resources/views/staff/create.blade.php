@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
    <h1 class="text-2xl font-semibold text-center">New Worker</h1>
@stop

@section('content')
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('staff.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="mb-4">
                        <label for="store_id" class="block text-sm font-medium text-gray-700">Store ID</label>
                        <select name="store_id" id="store_id" class="form-select mt-1 block w-full" required>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="form-input mt-1 block w-full" placeholder="Enter name" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" class="form-input mt-1 block w-full" placeholder="Enter email" required>
                    </div>

                    <div class="mb-4">
                        <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                        <input type="number" name="salary" id="salary" class="form-input mt-1 block w-full" placeholder="Enter a salary" required>
                    </div>

                    <div class="mb-4">
                        <label for="bank" class="block text-sm font-medium text-gray-700">Bank Account</label>
                        <input type="text" name="bank" id="bank" class="form-input mt-1 block w-full" placeholder="Enter bank account" required>
                    </div>
                    <button type="submit" class="btn btn-success bg-green">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@stop