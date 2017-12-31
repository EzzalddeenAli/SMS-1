<div class="form-group">

    {{--find asterisk--}}
    @php($name = explode(' ', $name))
    {{--if found remove it--}}
    @if(in_array('*', $name))
        @php($ast = true )
        @php($pos = array_search('*', $name))
        @php(array_splice($name, $pos, 1))
    @endif
    @php($name = implode(' ', $name))

    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{--replace with red asterisk if found--}}
    @isset($ast)
        <span class="text-red">*</span>
    @endisset
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>