<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>
    <!-- Dashboard -->
    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
    <!-- worklog -->
    <x-sidebar.link
        title="Work Logs"
        href="{{ route('worklog') }}"
        :isActive="request()->routeIs('worklog')"
    >
        <x-slot name="icon">
            <x-icons.worklogs class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <!-- income -->
    <x-sidebar.link
        title="Income"
        href="{{ route('income.index') }}"
        :isActive="request()->routeIs('income.index')"
    >
        <x-slot name="icon">
            <x-icons.income class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <!-- Expences -->
    <x-sidebar.link
        title="Expences"
        href="{{ route('expences') }}"
        :isActive="request()->routeIs('expences')"
    >
        <x-slot name="icon">
            <x-icons.expences class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>


</x-perfect-scrollbar>
