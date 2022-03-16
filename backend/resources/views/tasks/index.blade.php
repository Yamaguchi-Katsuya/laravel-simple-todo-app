<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-message />
    <x-list.task :tasks="$myTasks" :title="$title" />
</x-app-layout>
