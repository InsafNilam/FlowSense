<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Water Bill Unit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div
                    class="w-full max-w-md sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('water-bill-unit.store') }}">
                        @csrf
                        <!-- Min Units-->
                        <div class="mt-2">
                            <x-input-label for="min_units" :value="__('Min Units')" />
                            <x-text-input id="min_units" class="block mt-1 w-full" type="text" name="min_units"
                                :value="old('min_units')" required autofocus />
                            <x-input-error :messages="$errors->get('min_units')" class="mt-2" />
                        </div>

                        <!-- Max Units -->
                        <div class="mt-2">
                            <x-input-label for="max_units" :value="__('Max Units')" />
                            <x-text-input id="max_units" class="block mt-1 w-full" name="max_units" type="text"
                                :value="old('max_units')" required autofocus />
                            <x-input-error :messages="$errors->get('max_units')" class="mt-2" />
                        </div>

                        <!-- Fixed Charges -->
                        <div class="mt-2">
                            <x-input-label for="fixed_charge" :value="__('Fixed Charges')" />
                            <x-text-input id="fixed_charge" class="block mt-1 w-full" name="fixed_charge" type="text"
                                :value="old('fixed_charge')" required autofocus />
                            <x-input-error :messages="$errors->get('fixed_charge')" class="mt-2" />
                        </div>

                        <!-- Per Unit Charge -->
                        <div class="mt-2">
                            <x-input-label for="per_unit_charge" :value="__('Per Unit Charge')" />
                            <x-text-input id="per_unit_charge" class="block mt-1 w-full" type="text"
                                name="per_unit_charge" :value="old('per_unit_charge')" required autofocus />
                            <x-input-error :messages="$errors->get('per_unit_charge')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
