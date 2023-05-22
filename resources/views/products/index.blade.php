<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Product List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reviews</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                @if ($product->reviews->count() > 0)
                                <a href="{{ route('products.reviews', $product->id) }}">Ver reviews</a></td>
                                @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-primary-button><a  href="{{ route('products.edit', $product->id) }}">Edit</a></x-primary-button>
                                   <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>
                                                Delete
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


