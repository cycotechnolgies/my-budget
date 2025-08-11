@props(['income'])

<article 
    class="p-6 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 border-l-4 border-red-600 hover:shadow-lg transition-shadow duration-300"
    role="group"
    aria-labelledby="income-title-{{ $income->id }}"
>
    <a href="{{ route('income.show', $income->id) }}" class="block  rounded">
        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 items-center">
            <div 
                class="flex items-center justify-center bg-red-700 text-white font-extrabold text-3xl rounded-full w-20 h-20 mx-auto sm:mx-0"
                aria-label="Income ID {{ $income->id }}"
            >
                {{ $income->id }}
            </div>
            <div class="sm:col-span-4 space-y-1">
                <h2 id="income-title-{{ $income->id }}" class="text-xl font-semibold text-gray-900 dark:text-gray-100 truncate">
                    {{ $income->title }}
                </h2>
                <p class="text-gray-700 dark:text-gray-300 font-medium" aria-label="Amount received">
                    Amount: <span class="text-green-600 dark:text-green-400 font-semibold">Rs. {{ number_format($income->amount, 2) }}</span>
                </p>
                <time 
                    datetime="{{ \Carbon\Carbon::parse($income->Rec_date)->toDateString() }}" 
                    class="text-sm text-gray-500 dark:text-gray-400"
                    aria-label="Received date"
                >
                    {{ \Carbon\Carbon::parse($income->Rec_date)->format('F j, Y') }}
                </time>
            </div>
        </div>
    </a>
</article>
