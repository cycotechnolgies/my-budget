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
        <x-icons.insert class="mr-4" /> &nbsp;New Income
        </x-button>
    </div>
    
    {{-- <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
        @foreach ($incomes as $income)
            <x-cards.income :income="$income"/>
        @endforeach
    </div> --}}
    
    <x-table :paginator="$incomes">
        <x-slot name="header">
            <tr>
                <th scope="col" class="px-6 py-3">Inc_ID</th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Amount</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </x-slot>

        @foreach ($incomes as $income)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $income->id }}
                </th>
                <td class="px-6 py-4">{{ $income->title }}</td>
                <td class="px-6 py-4">${{ number_format($income->amount, 2) }}</td>
                <td class="px-6 py-4">{{ $income->Rec_date }}</td>
                <td class="px-6 py-4 flex flex-col justify-center gap-2 md:flex-row md:justify-start">
                     <x-button class="" variant="success" @click="$dispatch('open-modal', 'update-model')">
                       <x-icons.edit-pen />
                    </x-button> 
                    <x-button class="w-full md:w-auto" @click="$dispatch('open-modal', 'delete-income-{{ $income->id }}')">
                        <x-icons.delete-bin />
                    </x-button>
                    
                    <x-modals.delete-income-modal :income="$income" />
                </td>
            </tr>
        @endforeach
    </x-table>

    <div class="p-4">
        {{$incomes->links()}}
    </div>

    <x-modals.create-income />
    <x-modals.edit-income :income="$income" />
</x-app-layout>
