<link rel="stylesheet" href="{{ asset('css/list.css') }}">
<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-message />
    <x-list.task :tasks="[$task]" :title="$title" />
</x-app-layout>
