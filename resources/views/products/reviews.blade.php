<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review del producto') }} - {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($reviews as $review)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ $review->title }}</h3>
                            <h5>{{ $review->user->name }} </h5> <p>{{$review->user->email}}</p>
                            <p class="text-gray-500">{{ $review->body }}</p>
                            <p class="text-gray-600"> {{$review->created_at}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

