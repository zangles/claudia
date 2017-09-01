<form action="{{ route('turns.update2') }}" method="POST">
    {{ csrf_field() }}
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInDown">
            <div class="modal-header">
                <h4 class="modal-title">Editar Turno</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('turns.partials.TurnData')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <button type="submit" class="btn btn-danger">Borrar Turno</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Guardar Turno</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
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

        function loadTurn(patientName, turnStr) {
            turn = JSON.parse(turnStr);
            $("#editTurn #paciente").val(patientName);
            $("#editTurn #turnId").val(turn.id);
            $("#editTurn #turnDate").val(turn.date);
            $("#editTurn #comentarios").val(turn.comments);
            $("#editTurn #patientId").val(turn.patient_id);
        }
    </script>

@endsection