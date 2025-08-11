@props(['income'])

<x-card
    :id="$income->id"
    :title="$income->title"
    :amount="$income->amount"
    :date="$income->Rec_date"
    color="green"
>
    {{ route('income.show', $income->id) }}
</x-card>
