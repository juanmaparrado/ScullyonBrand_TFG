<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <span class="font-bold">ID:</span> {{ $order->id }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Nombre del Usuario:</span> {{ $order->user->name }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Email del Usuario:</span> {{ $order->user->email }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Estado:</span> {{ $order->status }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Método de Pago:</span> {{ $order->payment_method }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Total:</span> {{ $order->total }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Dirección:</span> {{ $order->address }}
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Ciudad:</span> {{ $order->city }}
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Detalles del Pedido</h3>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre del Producto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $orderItem->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $orderItem->product->name }}</td>
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

