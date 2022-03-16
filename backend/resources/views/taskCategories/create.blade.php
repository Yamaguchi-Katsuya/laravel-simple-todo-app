<?php $message = $message ?? ''; ?>
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-message />
    <div class="form-container">
        {{ Form::open(['url' => route('task-categories.store')]) }}
            <x-form.task-category :message="$message" :type="$type" />
        {{ Form::close() }}
    </div>
</x-app-layout>
