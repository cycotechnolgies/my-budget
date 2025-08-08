<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-3xl font-bold leading-tight">
                {{ __('Income') }}
            </h2>
        </div>
    </x-slot>
    <div class="flex justify-end p-6">
        <x-button x-data="" @click="$dispatch('open-modal', 'new-income-modal')">
        + New Income
        </x-button>
    </div>
    
    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
        @foreach ($incomes as $income)
            <x-card :income="$income">
                <div class="grid grid-cols-4 gap-2 items-center">
                    <div class="bg-red-700 text-white font-bold text-2xl rounded-full w-20 h-20 text-center content-center justify-items-center">
                        {{ $income['id'] }}
                    </div>
                    <div class="col-span-3 space-y-2">
                        <h3 class="text-lg font-semibold">{{ $income['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">Amount: ${{ number_format($income['amount'], 2) }}</p>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">{{ $income['Rec_date'] }}</p>
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>
    @if (count($incomes) === 0)
        <x-card>
            <div class="flex flex-col items-center justify-center col-span-2">
                <p class="text-gray-500">No income records found.</p>
            </div>
        </x-card>
    @endif

    <!-- modal -->
    <x-modal name="new-income-modal" focusable>
        <div class="p-6 space-y-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                Add New Income
            </h2>

            <form method="POST" action="{{ route('income.create') }}">
                @csrf

                <!-- Reuse same input fields for new entry -->
                <div>
                    <x-form.label for="title" value="Title" />
                    <x-form.input id="title" name="title" type="text" class="block w-full mt-1" required />
                </div>

                <div>
                    <x-form.label for="amount" value="Amount" />
                    <x-form.input id="amount" name="amount" type="number" step="0.01" class="block w-full mt-1" required />
                </div>

                <div>
                    <x-form.label for="Rec_date" value="Received Date" />
                    <x-form.input id="Rec_date" name="Rec_date" type="date" class="block w-full mt-1" required />
                </div>

                <div>
                    <x-form.label for="notes" value="Description" />
                    <textarea id="notes" name="notes" rows="4"
                        class="block w-full mt-1 rounded-md border-gray-300 dark:bg-dark-eval-2 dark:text-white"></textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <x-button type="button" x-on:click="$dispatch('close')">Cancel</x-button>
                    <x-button type="submit" class="bg-green-600 hover:bg-green-700 text-white">Save</x-button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>
