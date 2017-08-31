@if (isset($inputGroupText) or isset($inputGroupIcon))
    <div class="input-group">
        @include('themes.bootstrap.fields.forms.inputBase')
        @include('themes.bootstrap.fields.forms.inputGroup')
    </div>
@else
    @include('themes.bootstrap.fields.forms.inputBase')
@endif


