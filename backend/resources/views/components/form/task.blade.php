<?php
use App\Models\constant\FormType;
?>
<div class="form-content input-text">
    {{ Form::label('title',' Title') }}
    {{ Form::text(
        'title',
        null,
        [
            'id' => 'title',
            'placeholder' => 'Task title'
        ]
    ) }}
</div>
@error('title')
    <div class="alert">{{ $message }}</div>
@enderror

<div class="form-content input-text">
    {{ Form::label('description',' Description') }}
    {{ Form::textarea(
        'description',
        null,
        [
            'id' => 'description',
            'placeholder' => 'Task description',
            'rows' => '3'
        ]
    ) }}
</div>
@error('description')
    <div class="alert">{{ $message }}</div>
@enderror

<div class="form-content input-text">
    {{ Form::label('task_category_id',' Category') }}
    {{ Form::select(
        'task_category_id',
        $taskCategories,
        'ordinarily',
        [
            'id' => 'task_category_id'
        ]
    ) }}
</div>
@error('task_category_id')
    <div class="alert">{{ $message }}</div>
@enderror
{{ Form::submit(FormType::getTxt($type)) }}
