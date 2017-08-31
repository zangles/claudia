@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4 col-xs-6">
            <h2>Turnos</h2>
        </div>
        <div class="col-sm-8 col-xs-6">
            <div class="title-action">
                <a data-toggle="modal" data-target="#newTurn" class="btn btn-primary">Nuevo Turno</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        {!! Alert::render() !!}
        <div class="row animated fadeInDown">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Turnos del dia</h5>
                    </div>
                    <div class="ibox-content">
                        <ul class="list-group">
                            @foreach($todayTurns as $turn)
                                <li class="list-group-item">
                                        <span class="label label-primary">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $turn->date)->format('H:i')  }} hs
                                        </span>
                                    <span class="pull-right">
                                        <a href="{{ route('patient.edit', $turn->patient()->get()[0]->id ) }}">
                                            {{ $turn->patient()->get()[0]->name }}
                                        </a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
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
        </div>
    </div>

        <div class="modal inmodal" id="newTurn" tabindex="-1" role="dialog" aria-hidden="true">
            <form action="{{ route('turns.store') }}" method="POST">
                {{ csrf_field() }}
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
                                        <div class="ibox-content" style="max-height: 432px; overflow-y: auto">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="search" id="search" placeholder="Buscar">
                                            </div>
                                            <div class="list-group">
                                                @foreach($patients as $patient)
                                                    <a href="#" class="list-group-item list-patients" data-id="{{ $patient->id }}" data-name="{{ strtoupper($patient->name) }}">{{ $patient->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Datos Turno </h5>
                                        </div>
                                        <div class="ibox-content" style="max-height: 450px; overflow-y: auto">
                                            <div class="form-group">
                                                {!! Field::text('paciente','', ['disabled'=>'disabled'], ['basicForm'=>'']) !!}
                                                <input type="hidden" name="patientId" id="patientId">
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
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar Turno</button>
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/plugins/fullcalendar/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('/js/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        var turns = JSON.parse('{!! $turns->toJson()  !!}');

        $(document).ready(function() {

            $('#turnDate').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:00',
                sideBySide: true
            });

            $('#deleteTurnDate').click(function(){
                $('#turnDate').val('');
            });

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
                eventRender: function (event, element) {
                    var tooltip = event.Description;
                    $(element).attr("data-toggle", 'tooltip');
                    $(element).attr("data-placement", 'top');
                    $(element).attr("title", getEventComment(event.id));
                    $(element).tooltip({ container: "body"});
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
                timeFormat: 'H(:mm)',
                events: [
                    @foreach($turns as $turn)
                    {
                        id: {{ $turn->id }},
                        title: '{{ $turn->patient()->get()[0]->name }}',
                        start: new Date('{{ $turn->date }}'),
                        allDay: false,
                        url: '{{ route('patient.edit',$turn->patient()->get()[0]) }}'
                    },
                    @endforeach
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

        $(".list-patients").click(function(){
            $('#paciente').val($(this).html());
            $('#patientId').val($(this).data('id'));
        });

        function newTurnModal(date) {
            $("#turnDate").val(date.format('DD/MM/YYYY hh:mm:ss'));
            $('#myModal').modal({
                show: 'false'
            });
        }

        function getEventComment(id) {
            var comment;
            $.each(turns, function(k,v) {
                if (v.id === id){
                    comment = v.comments;
                }
            });

            return comment;
        }



    </script>
@endsection