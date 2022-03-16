<?php $message = $message ?? ''; ?>
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-message />
    <div class="form-container">
        {{ Form::model($taskCategory, ['method'=>'put', 'route'=>['task-categories.update', $taskCategory->id] ]) }}
            <x-form.task-category :message="$message" :type="$type" />
        {{ Form::close() }}
    </div>
</x-app-layout>
