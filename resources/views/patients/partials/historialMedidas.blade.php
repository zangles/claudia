<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInDown">
            <div class="modal-header">
                <h4 class="modal-title">Historial Medidas</h4>
            </div>
            <div class="modal-body" style="height: 500px; overflow-y: auto;">
                <div class="row">
                    <div class="col-md-6">
                        @include('patients.partials.historialPeso')
                    </div>
                    <div class="col-md-6">
                        @include('patients.partials.historialAltura')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>