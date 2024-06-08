<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Water Bill Unit') }}
            </h2>
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('water-bill-unit.create') }}"
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
                            <th data-priority="1" class="px-6 py-3 text-left">Range</th>
                            <th data-priority="1" class="px-6 py-3 text-left">Unit Charge</th>
                            <th data-priority="2" class="px-6 py-3 text-left">Fixed Charge</th>
                            <th data-priority="3" class="px-6 py-3 text-center">Created By</th>
                            <th data-priority="3" class="px-6 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($water_bill_units as $water_bill_unit)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $water_bill_unit->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">
                                    {{ $water_bill_unit->min_units }} -
                                    @if (!$water_bill_unit->max_units)
                                        Above
                                    @else
                                        {{ $water_bill_unit->max_units }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">
                                    {{ $water_bill_unit->per_unit_charge }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left">{{ $water_bill_unit->fixed_charge }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center uppercase">
                                    {{ $water_bill_unit->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-x-4 text-right">
                                        <a href="{{ route('water-bill-unit.show', $water_bill_unit) }}"
                                            class="text-blue-500 hover:text-blue-700">View
                                        </a>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('water-bill-unit.edit', $water_bill_unit) }}"
                                                class="text-green-500 hover:text-green-700">Edit
                                            </a>
                                            <form action="{{ route('water-bill-unit.destroy', $water_bill_unit) }}"
                                                method="POST" class="inline">
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
