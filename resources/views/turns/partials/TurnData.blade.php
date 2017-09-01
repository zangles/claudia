<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Datos Turno</h5>
    </div>
    <div class="ibox-content" style="max-height: 450px; overflow-y: auto">
        <div class="form-group">
            {!! Field::text(
                'paciente',
                ( isset($patientEdit) ) ? $patientEdit->name : '',
                ['disabled'=>'disabled'],
                ['basicForm'=>''])
            !!}
            <input type="hidden" name="patientId" id="patientId" value="{{ ( isset($patientEdit) ) ? $patientEdit->id : '' }}">
            <input type="hidden" name="turnId" id="turnId" value="">

            <div class="form-group">
                <div class='input-group date'>
                    <input type='text' class="form-control" name="turnDate" id='turnDate' />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" id="deleteTurnDate" type="button">
                            <i class="fa fa-trash"></i>
                        </button>
                    </span>
                </div>
            </div>
            {!! Field::textarea('comentarios', '', ['label' => 'Comentarios'],['basicForm'=>'']) !!}
        </div>
    </div>
</div>

@section('scripts')
    @parent()
    <script>
        $(document).ready(function() {
            $('#turnDate').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:00',
                sideBySide: true
            });

            $('#deleteTurnDate').click(function(){
                $('#turnDate').val('');
            });
        });
    </script>
@endsection