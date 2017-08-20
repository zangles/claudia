@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4 col-xs-6">
            <h2>Pacientes</h2>
        </div>
        <div class="col-sm-8 col-xs-6">
            <div class="title-action">
                <a href="{{ route('patient.create') }}" class="btn btn-primary">Nuevo Paciente</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-12">
                @include('common.statusMessage')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Buscar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($patients as $patient)
                @include('patients.partials.patientCard', $patient)
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#search").keyup(function(){
            search();
        });

        function search(){
            var search = $("#search").val().toUpperCase();

            if (search !== '') {
                if (search.length >= 3){
                    $(".patientCard").hide();
                    $(".patientCard .patientName:contains('"+search+"')").parents('.patientCard').show();
                }
            } else {
                $(".patientCard").show();
            }
        }
    </script>
@endsection