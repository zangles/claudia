@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4 col-xs-6">
            <h2>Ver Pacientes</h2>
        </div>
        <div class="col-sm-8 col-xs-6">
            <div class="title-action">
                <form id="deleteForm" action="{{ route('patient.destroy', $patient) }}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" id="deletePatient">Borrar Paciente</button>
                </form>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        @include('common.statusMessage')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="row">

            </div>
        <div class="row">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <form action="{{ route('patient.update', $patient) }}" class="form-horizontal" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="ibox-title">
                            <h5>Datos del paciente</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            @include('patients.partials.formDatos')
                        </div>
                        <div class="ibox-footer">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal">Historial medidas</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('patient.index') }}" class="btn btn-danger">Volver</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        @include('patients.partials.imc')
                    </div>
                    <div class="col-md-6">
                        @include('patients.partials.peso')
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('patients.partials.historialMedidas')
@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/chartJs/Chart.min.js') }}"></script>
    <script>
        $("#deletePatient").click(function(){
            if (confirm('Esta seguro que desea borrar al paciente?')) {
                $("#deleteForm").submit();
            }
            return false
        });
    </script>
@endsection