<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Water Bill') }}
            </h2>
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('water-bill.create') }}"
                    class="px-4 py-2 cursor-pointer text-sm rounded-full font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    ADD
                </a>
            @endif
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="pb-8 mt-6 lg:mt-0 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
                <table class="stripe hover text-gray-900 dark:text-white" style="width:100%; padding-bottom: 1em;">
                    <thead class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th data-priority="7" class="px-6 py-3">ID</th>
                            <th data-priority="1" class="px-6 py-3 text-left">Bill No</th>
                            <th data-priority="1" class="px-6 py-3 text-left">Bill Date</th>
                            <th data-priority="2" class="px-6 py-3 text-left">Due Date</th>
                            <th data-priority="3" class="px-6 py-3 text-center">Status</th>
                            <th data-priority="3" class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($water_bills as $water_bill)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $water_bill->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $water_bill->bill_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $water_bill->bill_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $water_bill->due_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($water_bill->status == 'paid')
                                        <span
                                            class="px-2 py-1 rounded-full block text-nowrap text-sm text-gray-900 dark:text-white  bg-emerald-500">PAID</span>
                                    @elseif ($water_bill->status == 'unpaid')
                                        <span
                                            class='px-2 py-1 rounded-full block text-nowrap text-sm text-gray-900 dark:text-white bg-red-500'>DEBT</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-x-4 text-right">
                                        <a href="{{ route('water-bill.show', $water_bill) }}"
                                            class="text-blue-500 hover:text-blue-700">View
                                        </a>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('water-bill.edit', $water_bill) }}"
                                                class="text-green-500 hover:text-green-700">Edit
                                            </a>
                                            <form action="{{ route('water-bill.destroy', $water_bill) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
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
</x-app-layout>
