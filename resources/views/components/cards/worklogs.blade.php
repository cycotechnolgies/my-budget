@props(['work'])

<x-card
    :id="$work->id"
    :title="$work->title"
    :date="$work->deadline"
    :description="$work->description"
    color="blue"
>
    {{ route('work.show', $work->id) }}
</x-card>
