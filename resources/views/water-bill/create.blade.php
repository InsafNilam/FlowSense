<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Water Bill') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div
                    class="w-full max-w-md sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('water-bill.store') }}">
                        @csrf
                        <!-- Bill No-->
                        <div class="mt-2">
                            <x-input-label for="bill_no" :value="__('Bill No')" />
                            <x-text-input id="bill_no" class="block mt-1 w-full" type="text" name="bill_no"
                                :value="old('bill_no')" required autofocus />
                            <x-input-error :messages="$errors->get('bill_no')" class="mt-2" />
                        </div>

                        <!-- Bill Date -->
                        <div class="mt-2">
                            <x-input-label for="bill_date" :value="__('Bill Date')" />
                            <x-text-input id="bill_date" class="block mt-1 w-full" name="bill_date" type="date"
                                :value="old('bill_date')" required autofocus />
                            <x-input-error :messages="$errors->get('bill_date')" class="mt-2" />
                        </div>

                        <!-- Due Date -->
                        <div class="mt-2">
                            <x-input-label for="due_date" :value="__('Due Date')" />
                            <x-text-input id="due_date" class="block mt-1 w-full" name="due_date" type="date"
                                :value="old('due_date')" required autofocus />
                            <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                        </div>

                        <!-- Bill Amount -->
                        <div class="mt-2">
                            <x-input-label for="bill_amount" :value="__('Bill Amount')" />
                            <x-text-input id="bill_amount" class="block mt-1 w-full" type="text" name="bill_amount"
                                :value="old('bill_amount')" required autofocus />
                            <x-input-error :messages="$errors->get('bill_amount')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-2">
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" class="block mt-1 w-full rounded-md bg-[#111827] text-white" required
                                name="status">
                                <option value="" {{ old('status') === '' ? 'selected' : '' }}>Select Status
                                </option>
                                <option value="unpaid" {{ old('status') === 'unpaid' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="paid" {{ old('status') === 'paid' ? 'selected' : '' }}>Paid</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
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
