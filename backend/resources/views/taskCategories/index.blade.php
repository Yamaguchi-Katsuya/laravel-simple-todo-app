<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-message />
    <x-list.task-category :taskCategories="$myTaskCategories" :title="$title" />
</x-app-layout>
