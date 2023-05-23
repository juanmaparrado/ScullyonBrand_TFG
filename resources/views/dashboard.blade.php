<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Top Products</h3>
                        @foreach ($topProducts as $product)
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.293 14.707a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414L10 11.586l-3.293-3.293a1 1 0 0 0-1.414 1.414l5 5zM5 10a1 1 0 0 0 2 0 1 1 0 0 1 2 0c0 2.757-2.243 5-5 5a1 1 0 0 1 0-2z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $product->name }} ({{ $product->order_items_count }} orders)
                                </span>
                               
                        @endforeach
                </div>
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Stores with Low Inventory</h3>
                    <ul>
                        @foreach ($storesWithLowInventory as $store)
                            <li>
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-2a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                {{ $store->name }} ({{ $store->inventories_count }} products)
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Top Reviewed Products</h3>
                    <ul>
                        @foreach ($topReviewedProducts as $product)
                            <li>
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3.707 4.293a1 1 0 0 0-1.414 1.414L5.586 10 2.293 13.293a1 1 0 0 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 0 0 1.414-1.414L10.414 10l3.293-3.293a1 1 0 0 0-1.414-1.414L10 8.586 6.707 5.293a1 1 0 0 0-1.414-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                {{ $product->name }} ({{ $product->reviews_count }} reviews)
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold mb-4">Completed Orders</h3>
                    <p>{{ $completedOrders }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-lg font-semibold mb-4">Total Revenue</h3>
                    <p>{{ $totalRevenue }}</p>
                </div>
            </div>
    </div>
</x-app-layout>



