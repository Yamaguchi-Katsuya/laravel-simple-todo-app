<link rel="stylesheet" href="{{ asset('css/list.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-list.task :tasks="$myTasks" :title="$taskTitle" />
    <x-list.task-category :taskCategories="$myTaskCategories" :title="$taskCategoryTitle" />
</x-app-layout>
