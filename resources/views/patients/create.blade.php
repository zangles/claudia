@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4 col-xs-6">
            <h2>Nuevo Pacientes</h2>
        </div>
        <div class="col-sm-8 col-xs-6">
            <div class="title-action">
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="ibox float-e-margins">
                    <form action="{{ route('patient.store') }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="ibox-title">
                            <h5>Datos del paciente</h5>
                        </div>
                        <div class="ibox-content">
                            {!! Field::text('name', ['label' => 'Nombre']) !!}
                            {!! Field::text('age', ['label' => 'Edad']) !!}
                            {!! Field::text('phone', ['label' => 'Telefono']) !!}
                            {!! Field::text('email', ['label' => 'Email']) !!}
                            {!! Field::text('weight', ['label' => 'Peso'],['inputGroup' => 'Kg']) !!}
                            {!! Field::text('height', ['label' => 'Altura'],['inputGroup' => 'cm']) !!}
                        </div>
                        <div class="ibox-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('patient.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection