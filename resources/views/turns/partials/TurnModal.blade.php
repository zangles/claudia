<div class="modal inmodal" id="newTurn" tabindex="-1" role="dialog" aria-hidden="true">
    @include('turns.templates.turnModalNew')
</div>

<div class="modal inmodal" id="editTurn" tabindex="-1" role="dialog" aria-hidden="true">
    @include('turns.templates.turnModalEdit')
</div>

@section('scripts')
    @parent()

@endsection