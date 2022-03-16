<x-layouts.list>
    <div class="text-xl text-center font-bold list-head">
        <a href="{{ route('task-categories.index') }}">{{ $title }}</a>
        <a class="operation-btn new-btn" href="{{ route('task-categories.create') }}">Create</a>
    </div>
    <div class="overflow-hidden">
        <x-table.task-category :taskCategories="$taskCategories" />
    </div>
</x-layouts.list>
