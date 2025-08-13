@props(['income'])

<x-modal name="delete-income-{{ $income->id }}" focusable>
    <div class="p-6">
        <h2 class="text-lg font-semibold">Delete {{ $income->name }}</h2>
        <p class="mt-2 text-sm">Are you sure you want to delete {{ $income->name }}? This cannot be undone.</p>

        <div class="mt-6 flex justify-end space-x-3">
            <x-button variant="dim" @click="$dispatch('close')">Cancel</x-button>

            <form method="POST" action="{{ route('income.del', $income->id) }}">
                @csrf
                @method('DELETE')
                <x-button type="submit" variant="danger">
                    <x-icons.delete-bin /> Delete
                </x-button>
            </form>
        </div>
    </div>
</x-modal>
