@props(['id', 'title', 'amount' => null, 'date' => null, 'description' => null, 'color' => 'gray'])

<article class="p-6 overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 border-l-4 border-red-600 hover:shadow-lg transition-shadow duration-300" role="group" aria-labelledby="card-title-{{ $id }}">
    <a href="{{ $slot ?? '#' }}" class="block focus:outline-none focus:ring-2 rounded">
        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 items-center">
            <div class="flex items-center justify-center rounded-full w-20 h-20 mx-auto sm:mx-0 bg-red-600 text-white font-extrabold text-3xl" aria-label="ID {{ $id }}">
                {{ $id }}
            </div>
            <div class="sm:col-span-4 space-y-1">
                <h2 id="card-title-{{ $id }}" class="text-xl font-semibold  text-gray-900 dark:text-gray-100 truncate">
                    {{ $title }}
                </h2>
                @if($amount !== null)
                    <p class="text-gray-700 dark:text-gray-300 font-medium">
                        Amount: <span class="text-green-600 dark:text-green-400 font-semibold">${{ number_format($amount, 2) }}</span>
                    </p>
                @endif
                @if($date !== null)
                    <time datetime="{{ \Carbon\Carbon::parse($date)->toDateString() }}" class="text-sm text-gray-500 dark:text-gray-400" aria-label="Date">
                        {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}
                    </time>
                @endif
                @if($description)
                    <p class="text-gray-600 dark:text-gray-400 text-sm truncate">{{ $description }}</p>
                @endif
            </div>
        </div>
    </a>
</article>
