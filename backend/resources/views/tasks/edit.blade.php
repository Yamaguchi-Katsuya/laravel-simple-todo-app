<?php $message = $message ?? ''; ?>
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<x-app-layout>
    <x-slot name="header"></x-slot>
    <x-message />
    <div class="form-container">
        {{ Form::model($task, ['method'=>'put', 'route'=>['tasks.update', $task->id] ]) }}
            <x-form.task :message="$message" :taskCategories="$taskCategories" :type="$type" />
        {{ Form::close() }}
    </div>
</x-app-layout>
