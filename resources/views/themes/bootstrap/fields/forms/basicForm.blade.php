<label for="{{ $id }}" class="control-label">
    {{ $label }}
</label>

@if ($required)
    <span class="label label-info">Required</span>
@endif

<div class="controls">
    @include('themes.bootstrap.fields.forms.input')
</div>