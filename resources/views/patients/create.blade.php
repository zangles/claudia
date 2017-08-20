@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Nuevo Pacientes</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
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
            <div class="col-md-offset-3 col-md-6">
                <div class="ibox float-e-margins">
                    <form action="{{ route('patient.store') }}" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="ibox-title">
                            <h5>Datos del paciente</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10"><input type="text" name="name" class="form-control" value="{{ old('name') }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Edad</label>
                                <div class="col-sm-10"><input type="number" name="age" class="form-control" value="{{ old('age') }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10"><input type="text" name="phone" class="form-control" value="{{ old('phone') }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10"><input type="email" name="email" class="form-control" value="{{ old('email') }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Peso</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="weight" value="{{ old('weight') }}">
                                        <span class="input-group-addon">Kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Altura</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="height" value="{{ old('height') }}">
                                        <span class="input-group-addon">cm</span>
                                    </div>
                                </div>
                            </div>
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