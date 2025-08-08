<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <div class="flex flex-row justify-end items-center space-y-2">
            <x-button class="" @click="$dispatch('open-modal', 'income-model')">
                Update
            </x-button>
        </div>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-white">
                <span class="text-red-600 font-bold">#{{ $income->id }}</span> – {{ $income->title }}
            </h2>
        </div>
    </x-slot>

    <!-- Income Details -->
    <div class="p-6 bg-white dark:bg-dark-eval-1 rounded-lg shadow-md border-l-4 border-red-600">
        <table class="w-full table-auto border-collapse">
            <tbody class="text-gray-800 dark:text-gray-100 text-sm md:text-base">
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th class="text-left py-3 pr-4 font-semibold w-1/3">Amount</th>
                    <td class="py-3">
                        Rs. {{ number_format($income->amount, 2) }} /=
                    </td>
                </tr>

                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th class="text-left py-3 pr-4 font-semibold">Paid Date</th>
                    <td class="py-3">
                        {{ \Carbon\Carbon::parse($income->Rec_date)->toFormattedDateString() }}
                    </td>
                </tr>

                <tr>
                    <th class="text-left py-3 pr-4 font-semibold align-top">Description</th>
                    <td class="align-top py-3">
                        {{ $income->notes }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Update Modal -->
    <x-modal name="income-model">
        <div class="p-6 space-y-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                Update Income Details
            </h2>

            <form method="POST" action="{{ route('income.update', $income->id) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <x-form.label for="title" value="Title" />
                    <x-form.input
                        id="title"
                        name="title"
                        type="text"
                        class="mt-1 block w-full"
                        value="{{ old('title', $income->title) }}"
                        required
                    />
                    <x-form.error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Amount -->
                <div>
                    <x-form.label for="amount" value="Amount" />
                    <x-form.input
                        id="amount"
                        name="amount"
                        type="number"
                        step="0.01"
                        class="mt-1 block w-full"
                        value="{{ old('amount', $income->amount) }}"
                        required
                    />
                    <x-form.error :messages="$errors->get('amount')" class="mt-2" />
                </div>

                <!-- Received Date -->
                <div>
                    <x-form.label for="Rec_date" value="Received Date" />
                    <x-form.input
                        id="Rec_date"
                        name="Rec_date"
                        type="date"
                        class="mt-1 block w-full"
                        value="{{ old('Rec_date', $income->Rec_date) }}"
                        required
                    />
                    <x-form.error :messages="$errors->get('Rec_date')" class="mt-2" />
                </div>

                <!-- Notes -->
                <div>
                    <x-form.label for="notes" value="Description" />
                    <textarea
                        id="notes"
                        name="notes"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-dark-eval-2 dark:text-white"
                        rows="4"
                    >{{ old('notes', $income->notes) }}</textarea>
                    <x-form.error :messages="$errors->get('notes')" class="mt-2" />
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-3 pt-4">
                    <x-button type="button" x-on:click="$dispatch('close')">
                        Cancel
                    </x-button>
                    <x-button type="submit" class="bg-red-600 hover:bg-red-700 text-white">
                        Save Changes
                    </x-button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>
