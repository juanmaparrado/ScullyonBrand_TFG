<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Create Store</h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4">
                    <h1 class="text-2xl font-semibold mb-4">Create Store</h1>

                    <form action="{{ route('stores.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block font-medium">Name</label>
                            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block font-medium">Address</label>
                            <input type="text" name="address" id="address" class="w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block font-medium">City</label>
                            <input type="text" name="city" id="city" class="w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block font-medium">Phone</label>
                            <input type="text" name="phone" id="phone" class="w-full border-gray-300 rounded-md" required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create</button>
                            <a href="{{ route('stores.index') }}" class="text-blue-500 hover:text-blue-600 ml-4">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
