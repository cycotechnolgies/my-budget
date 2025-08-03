<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-3xl font-bold leading-tight">
                {{ __('Income') }}
            </h2>
        </div>
    </x-slot>
    <div class="flex justify-end p-6">
        <x-button x-data="" @click="$dispatch('open-modal', 'income-model')">
        + New Income
        </x-button>
    </div>
    
    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
        @foreach ($incomes as $income)
            <x-card>
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
    <x-modal name="income-model">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Add New Item
            </h2>

            <form method="POST" action="" class="mt-6">
                @csrf

                <div>
                    <x-form.label for="name" value="Name" />
                    <x-form.input
                        id="name"
                        name="name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                    <x-form.error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-form.label for="description" value="Description" />
                    <x-form.input
                        id="description"
                        name="description"
                        type="text"
                        class="mt-1 block w-full"
                    />
                    <x-form.error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-button x-on:click="$dispatch('close')">
                        Cancel
                    </x-button>

                    <x-button class="ml-3">
                        Save
                    </x-button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>
