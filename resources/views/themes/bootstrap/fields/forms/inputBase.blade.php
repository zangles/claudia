{!! $input !!}
@foreach ($errors as $error)
    <p class="help-block">{{ $error }}</p>
@endforeach