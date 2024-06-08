<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="pb-8 mt-6 lg:mt-0 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
                <table class="stripe hover text-gray-900 dark:text-white" style="width:100%; padding-bottom: 1em;">
                    <thead class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th data-priority="7" class="px-6 py-3">ID</th>
                            <th data-priority="1" class="px-6 py-3 text-left">Name</th>
                            <th data-priority="1" class="px-6 py-3 text-left">UserName</th>
                            <th data-priority="2" class="px-6 py-3 text-left">Email</th>
                            <th data-priority="3" class="px-6 py-3 text-left">Address</th>
                            <th data-priority="3" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $customer->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $customer->username }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $customer->user->email }}</td>
                                <td class="px-6 py-4 text-left">{{ $customer->address }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('customer.show', $customer) }}"
                                        class="text-green-500 hover:text-green-700">View</a>
                                    @if (Auth::user()->role == 'customer' && Auth::user()->id == $customer->user_id)
                                        <a href="{{ route('customer.edit', $customer) }}"
                                            class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('customer.destroy', $customer) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {!! $links !!}
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
