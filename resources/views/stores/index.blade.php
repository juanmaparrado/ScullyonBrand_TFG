<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Store List</h1>
        <a href="{{ route('stores.create') }}" class="btn btn-primary">Create Store</a>
    </x-slot>

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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inventory</th>
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
                                    <x-primary-button>
                                        <a href="{{ route('stores.staff', $store->id) }}">View Staff</a>
                                    </x-primary-button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-primary-button>
                                        <a href="{{ route('stores.inventory', $store->id) }}" class="text-green-500 hover:text-green-600 ml-4">View Inventory</a>
                                    </x-primary-button>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex">
                                        <a href="{{ route('stores.edit', $store->id) }}" class="text-blue-500 hover:text-blue-600 ml-4">Edit</a>
                                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 ml-4">Delete</button>
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

