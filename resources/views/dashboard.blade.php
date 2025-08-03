<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-3xl font-bold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

        <div class="grid md:grid-col-4 xl:grid-cols-4 lg:grid-cols-4 grid-cols-1 gap-4">
            <div>
                <x-statsCard>
                    <h3 class="text-xl font-semibold text-green-600 text-right uppercase">{{ 'INCOME' }}</h3>
                    <h1 class="text-4xl font-bold text-right">Rs. {{ 20000 }}</h1>
                </x-statsCard>
            </div>
            <div>
                <x-statsCard>
                    <h3 class="text-xl font-semibold text-red-600 text-right uppercase">{{ 'EXPENCES' }}</h3>
                    <h1 class="text-4xl font-bold text-right">Rs. {{ 10000 }}</h1>
                </x-statsCard>
            </div>
            <div>
                <x-statsCard>
                    <h3 class="text-xl font-semibold text-blue-600 text-right uppercase">{{ 'Onging Work' }}</h3>
                    <h1 class="text-4xl font-bold text-right">{{ 2 }}</h1>
                </x-statsCard>
            </div>
            <div>
                <x-statsCard>
                    <h3 class="text-xl font-semibold text-orange-600 text-right uppercase">{{ 'Competed Work' }}</h3>
                    <h1 class="text-4xl font-bold text-right">{{ 10 }}</h1>
                </x-statsCard>
            </div>
        </div>
</x-app-layout>
