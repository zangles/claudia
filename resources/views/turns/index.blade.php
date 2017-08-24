@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4 col-xs-6">
            <h2>Turnos</h2>
        </div>
        <div class="col-sm-8 col-xs-6">
            <div class="title-action">
                <a href="{{ route('patient.create') }}" class="btn btn-primary">Nuevo Turno</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row animated fadeInDown">
            <div class="col-lg-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Turnos </h5>
                    </div>
                    <div class="ibox-content">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Turnos del dia</h5>
                    </div>
                    <div class="ibox-content">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInDown">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Turno</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Pacientes </h5>
                                </div>
                                <div class="ibox-content" style="max-height: 400px; overflow-y: auto">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="Buscar">
                                    </div>
                                    <div class="list-group">
                                        @foreach($patients as $patient)
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                            <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Datos Turno </h5>
                                </div>
                                <div class="ibox-content" style="max-height: 400px; overflow-y: auto">
                                    <div class="form-group">
                                        {!! Field::text('turnDate', '', ['label' => 'Fecha'],['basicForm'=>'']) !!}
                                        {!! Field::textarea('comentarios', '', ['label' => 'Comentarios'],['basicForm'=>'']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar Turno</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/plugins/fullcalendar/fullcalendar.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('/js/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/

            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                height: 550,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function(date, jsEvent, ui, resourceId ) {
                    var patientId = $(this).data('id');
                    var turn = date.format('DD/MM/YYYY HH:mm:ss');
                    console.debug($('#calendar').fullCalendar('clientEvents'));
                },
                dayClick: function(date, jsEvent, view) {
                    var calendar = $('#calendar');
                    if (view.name === "month") {
                        calendar.fullCalendar('gotoDate', date);
                        calendar.fullCalendar('changeView', 'agendaDay');
                    }
                    if (view.name === 'agendaDay') {
                        newTurnModal(date);
                    }
                },
                events: [
//                    {
//                        title: 'All Day Event',
//                        start: new Date(y, m, 1)
//                    },
//                    {
//                        title: 'Long Event',
//                        start: new Date(y, m, d-5),
//                        end: new Date(y, m, d-2),
//                    },
//                    {
//                        id: 999,
//                        title: 'Repeating Event',
//                        start: new Date(y, m, d-3, 16, 0),
//                        allDay: false,
//                    },
//                    {
//                        id: 999,
//                        title: 'Repeating Event',
//                        start: new Date(y, m, d+4, 16, 0),
//                        allDay: false
//                    },
//                    {
//                        title: 'Meeting',
//                        start: new Date(y, m, d, 10, 30),
//                        allDay: false
//                    },
//                    {
//                        title: 'Lunch',
//                        start: new Date(y, m, d, 12, 0),
//                        end: new Date(y, m, d, 14, 0),
//                        allDay: false
//                    },
//                    {
//                        title: 'Birthday Party',
//                        start: new Date(y, m, d+1, 19, 0),
//                        end: new Date(y, m, d+1, 22, 30),
//                        allDay: false
//                    },
//                    {
//                        title: 'Click for Google',
//                        start: new Date(y, m, 28),
//                        end: new Date(y, m, 29),
//                        url: 'http://google.com/'
//                    }
                ],
            });


        });

        $("#search").keyup(function(){
            search();
        });

        function search(){
            var search = $("#search").val().toUpperCase();

            if (search !== '') {
                if (search.length >= 3){
                    $(".list-patients").hide();
                    $(".list-patients[data-name*='"+search+"'").show();
                }
            } else {
                $(".list-patients").show();
            }
        };

        function newTurnModal(date) {
            $("#turnDate").val(date.format('DD/MM/YYYY hh:mm:ss'));
            $('#myModal').modal({
                show: 'false'
            });
        }


    </script>
@endsection