@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') 
<h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('Order Details') }}
</h2>
@stop

@section('content')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <span class="font-bold">Name of user:</span> {{ $order->user->name }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Email of user:</span> {{ $order->user->email }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Status:</span> {{ $order->status }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Payment Method:</span> {{ $order->payment_method }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Total:</span> {{ $order->total }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Address:</span> {{ $order->address }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">City:</span> {{ $order->city }}
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Order Item Details</h3>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name of Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($orderItem->product == null){
                                                    <span class="text-gray-500">Product unavailable</span>
                                                }
                                                @else
                                                {{$orderItem->product->name }}
                                                @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $orderItem->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $orderItem->price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $orderItem->quantity * $orderItem->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@stop
