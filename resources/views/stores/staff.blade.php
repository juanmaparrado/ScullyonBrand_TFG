<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">{{ $store->name }} Staff</h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bank Account</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($staff as $worker)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $worker->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $worker->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $worker->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $worker->salary }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $worker->bank_account }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
