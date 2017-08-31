<span class="input-group-addon">
    @if(isset($inputGroupIcon))
        <i class="fa fa-{{ $inputGroupIcon }}"></i>
    @else
        {{ $inputGroupText }}
    @endif
</span>