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
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("Nothing for now")  }}
    </div>
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
