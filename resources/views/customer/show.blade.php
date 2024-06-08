<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                        Customer Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                        Details about the customer.
                    </p>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200 dark:divide-gray-700">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $customer->user->name }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                User Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $customer->username }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Email
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $customer->user->email }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Address
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $customer->address }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Bill No
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $customer->bill_no }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                Registered At
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ $customer->created_at->format('d M Y') }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
                <div class="flex justify-end items-end">
                    <button onclick="window.location.href='{{ route('customer.edit', $customer->id) }}'"
                        class="mr-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 rounded-md">
                        Edit
                    </button>
                    <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" class="inline">
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
    </div>
</x-app-layout>
