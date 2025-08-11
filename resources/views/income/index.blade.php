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
            <x-cards.income :income="$income"/>
        @endforeach
    </div>
    

    {{$incomes->links()}}

    <x-modals.create-income />
</x-app-layout>
