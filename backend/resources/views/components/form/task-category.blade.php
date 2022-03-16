<?php
use App\Models\constant\FormType;
?>
<div class="form-content input-text">
    {{ Form::label('name',' Name') }}
    {{ Form::text(
        'name',
        null,
        [
            'id' => 'name',
            'placeholder' => 'Category name'
        ]
    ) }}
</div>
@error('name')
    <div class="alert">{{ $message }}</div>
@enderror
{{ Form::submit(FormType::getTxt($type)) }}
