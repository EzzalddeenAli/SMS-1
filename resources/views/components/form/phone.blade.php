<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    <div class="input-group">
        <div class="input-group-addon">09</div>
        {{ Form::number($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>