@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
    <h1 class="text-2xl font-semibold text-center">Store List</h1>
@stop

@section('content')
<x-app-layout>
    <div style="display: grid; place-items: center;">
        <a href="{{ route('stores.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create Store</a>
    </div>
    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Staff</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">StockTaking</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($stores as $store)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $store->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $store->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $store->city }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $store->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('stores.staff', $store->id) }}">
                                        <x-primary-button>
                                            View Staff
                                        </x-primary-button>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('stores.stocktaking', $store->id) }}" class="text-green-500 hover:text-green-600">
                                        <x-primary-button>
                                            View Inventory
                                        </x-primary-button>
                                    </a>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex">
                                        <x-primary-button><a href="{{ route('stores.edit', $store->id) }}" class="text-blue-500">Edit</a></x-primary-button>
                                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit" class="text-red-500 hover:text-red-600 ml-4">Delete</x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
@stop