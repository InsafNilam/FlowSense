<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div
                    class="w-full max-w-md sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form method="PUT" action="{{ route('customer.update', $customer->id) }}">
                        @csrf
                        <!-- User Name-->
                        <div class="mt-2">
                            <x-input-label for="username" :value="__('User Name')" />
                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                :value="old('username')" required autofocus />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <!-- Email -->
                        <div class="mt-2">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" name="address" type="email"
                                :value="old('address')" required autofocus />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
