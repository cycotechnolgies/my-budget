<x-modal name="new-income-modal" focusable>
    <div class="p-6 space-y-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
            Add New Income
        </h2>

        <form method="POST" action="{{ route('income.create') }}">
            @csrf

            <!-- Title -->
            <div>
                <x-form.label for="title" value="Title" />
                <x-form.input id="title" name="title" type="text" class="block w-full mt-1" required />
            </div>

            <!-- Amount -->
            <div>
                <x-form.label for="amount" value="Amount" />
                <x-form.input id="amount" name="amount" type="number" step="0.01" class="block w-full mt-1" required />
            </div>

            <!-- Received Date -->
            <div>
                <x-form.label for="Rec_date" value="Received Date" />
                <x-form.input id="Rec_date" name="Rec_date" type="date" class="block w-full mt-1" required />
            </div>

            <!-- Description -->
            <div>
                <x-form.label for="notes" value="Description" />
                <textarea id="notes" name="notes" rows="4"
                    class="block w-full mt-1 rounded-md border-gray-300 dark:bg-dark-eval-2 dark:text-white"></textarea>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3 pt-4">
                <x-button type="button" x-on:click="$dispatch('close')">Cancel</x-button>
                <x-button type="submit" class="bg-green-600 hover:bg-green-700 text-white">Save</x-button>
            </div>
        </form>
    </div>
</x-modal>
