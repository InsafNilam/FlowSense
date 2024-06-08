<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Water Bill') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                        Water Bill Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                        Details about the water bill.
                    </p>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200 dark:divide-gray-700">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Bill No
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $water_bill->bill_no }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Bill Date
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $water_bill->bill_date }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Due Date
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $water_bill->due_date }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Bill Amout
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $water_bill->bill_amount }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Status
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                @if ($water_bill->status == 'paid')
                                    <span
                                        class="px-2 py-2 rounded-full text-nowrap text-sm text-gray-900 dark:text-white  bg-emerald-500">PAID</span>
                                @elseif ($water_bill->status == 'unpaid')
                                    <span
                                        class='px-2 py-2 rounded-full text-nowrap text-sm text-gray-900 dark:text-white bg-red-500'>DEBT</span>
                                @endif
                            </dd>
                        </div>
                        @if ($water_bill->customer)
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    User Info
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                    <div class="flex gap-4">
                                        <div
                                            class="basis-1/4 border-r border-dashed mr-4 text-gray-500 dark:text-gray-400">
                                            <span class="block bold">Name</span>
                                            <span class="block bold">UserName</span>
                                            <span class="block bold">Address</span>
                                            <span class="block bold">Email</span>
                                        </div>
                                        <div class="basis-3/4">
                                            <span class="block">
                                                {{ $water_bill->customer->user->name }}
                                            </span>
                                            <span class="block">
                                                {{ $water_bill->customer->username }}
                                            </span>
                                            <span class="block">
                                                {{ $water_bill->customer->address }}
                                            </span>
                                            <span class="block">
                                                {{ $water_bill->customer->user->email }}
                                            </span>
                                        </div>
                                    </div>
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
                <div class="flex justify-end items-end">
                    <button onclick="window.location.href='{{ route('water-bill.edit', $water_bill->id) }}'"
                        class="mr-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 rounded-md">
                        Edit
                    </button>
                    <form action="{{ route('water-bill.destroy', $water_bill->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 dark:bg-red-500 hover:bg-red-700 dark:hover:bg-red-600 rounded-md">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
