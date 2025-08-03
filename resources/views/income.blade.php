<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-3xl font-bold leading-tight">
                {{ __('Income') }}
            </h2>
        </div>
    </x-slot>
    <div class="flex justify-end p-6">
        <x-button x-data="" @click="$dispatch('open-modal', 'your-modal-name')">
        + New Income
        </x-button>
    </div>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("Nothing for now")  }}
    </div>
    <x-modal name="your-modal-name">
    <div class="p-6">
        <!-- Your modal content goes here -->
        <h2 class="text-lg font-medium">Modal Title</h2>
        <p class="mt-4">Modal content goes here...</p>
        
        <!-- Optional footer with actions -->
        <div class="mt-6 flex justify-end">
            <x-button @click="$dispatch('close')">
                Close Modal
            </x-button>
        </div>
    </div>
</x-modal>
</x-app-layout>
