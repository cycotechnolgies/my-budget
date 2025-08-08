@props(['income'])
<div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 border-l-2 border-red-600">
    <a href="{{ route('income.show', $income->id) }}">
        {{ $slot }}
    </a>
</div>