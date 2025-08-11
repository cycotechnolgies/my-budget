@props(['expense'])

<x-card
    :id="$expense->id"
    :title="$expense->title"
    :amount="$expense->amount"
    :date="$expense->date"
    color="red"
>
    {{ route('expense.show', $expense->id) }}
</x-card>
