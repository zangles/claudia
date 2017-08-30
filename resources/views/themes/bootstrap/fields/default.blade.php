<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    @if (isset($basicForm))
        @include('themes.bootstrap.fields.forms.basicForm')
    @else
        @include('themes.bootstrap.fields.forms.inlineForm')
    @endif
</div>



