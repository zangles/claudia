<form action="{{ route('turns.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInDown">
            <div class="modal-header">
                <h4 class="modal-title">
                    @if (isset($patientEdit))
                        Editar Turno
                    @else
                        Nuevo Turno
                    @endif
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if (isset($patientEdit))
                        <div class="col-md-12">
                            @include('turns.partials.TurnData')
                        </div>
                    @else
                        <div class="col-md-5">
                            @include('turns.partials.TurnUserSearch')
                        </div>

                        <div class="col-md-7">
                            @include('turns.partials.TurnData')
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Turno</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</form>

@section('scripts')
    @parent()

    <script>
        $(document).ready(function() {
            $(".list-patients").click(function(){
                $('#paciente').val($(this).html());
                $('#patientId').val($(this).data('id'));
            });
        });
    </script>

@endsection