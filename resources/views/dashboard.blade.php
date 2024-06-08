<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div
                    class="w-full max-w-md sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form action="{{ route('customer.calculate') }}" method="POST"></form>
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="units" :value="__('Units')" />
                        <x-text-input id="units" class="block mt-1 w-full" type="text" name="units"
                            :value="old('units')" required autofocus />
                        <x-input-error :messages="$errors->get('units')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Calculate') }}
                        </x-primary-button>
                    </div>
                    </form>
                    <div class="my-4 space-y-4 border-t border-dashed py-4">
                        <h2 class="text-gray-900 dark:text-white text-lg">Monthly Summary</h2>
                        <div class="flex items-center">
                            <p class="text-gray-900 dark:text-white text-sm font-bold basis-2/5">Units</p>
                            <p class="text-gray-900 dark:text-white text-sm basis-3/5 text-right">{{ $unit }}
                            </p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-gray-900 dark:text-white text-sm font-bold basis-2/5">Total Cost</p>
                            <p class="text-gray-900 dark:text-white text-sm basis-3/5 text-right">{{ $cost }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
