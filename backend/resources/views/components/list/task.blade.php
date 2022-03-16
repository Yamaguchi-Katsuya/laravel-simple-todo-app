<x-layouts.list>
    <div class="text-xl text-center font-bold list-head">
        <a href="{{ route('tasks.index') }}">{{ $title }}</a>
        <a class="operation-btn new-btn" href="{{ route('tasks.create') }}">Create</a>
    </div>
    <div class="overflow-hidden">
        <x-table.task :tasks="$tasks" />
    </div>
</x-layouts.list>
