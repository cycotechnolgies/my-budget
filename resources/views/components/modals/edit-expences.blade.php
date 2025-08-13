@props(['income'])

<x-modal name="update-model">
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
                    <x-button variant="dim" type="button" x-on:click="$dispatch('close')">
                        Cancel
                    </x-button>
                    <x-button type="submit" variant="success">
                        Save Changes
                    </x-button>
                </div>
            </form>
        </div>
    </x-modal>