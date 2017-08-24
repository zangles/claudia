<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    @if (isset($basicForm))
        <label for="{{ $id }}" class="control-label">
            {{ $label }}
        </label>

        @if ($required)
            <span class="label label-info">Required</span>
        @endif

        <div class="controls">
            {!! $input !!}
            @foreach ($errors as $error)
                <p class="help-block">{{ $error }}</p>
            @endforeach
        </div>
    @else
        <label for="{{ $id }}" class="col-sm-2 control-label">
            {{ $label }}
        </label>
        <div class="col-sm-10">
            <div class="controls">
                @if (isset($inputGroup))
                    <div class="input-group">
                        {!! $input !!}
                        <span class="input-group-addon">{{ $inputGroup }}</span>
                    </div>
                @else
                    {!! $input !!}
                @endif
                @foreach ($errors as $error)
                    <p class="help-block">{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif
</div>



