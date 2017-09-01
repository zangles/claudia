<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>{{ (isset($title)) ? $title : "Turnos" }}</h5>
        <div class="ibox-tools">
            <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#newTurn">
                <i class="fa fa-plus"></i>
                Nuevo Turno
            </button>
        </div>
    </div>
    <div class="ibox-content">
        <div id="calendar"></div>
    </div>
</div>

@include('turns.partials.TurnModal', $patients)

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/fullcalendar/fullcalendar.css') }}">
@endsection

@section('scripts')
    @parent()
    <script src="{{ asset('/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

    <script>

        function eventMove(event) {
            updateTurn(event.id, event.start.format('YYYY-MM-DD HH:mm:SS'))
        }

        function updateTurn(turnId, turnNewDate ) {
            data = {
                "turnId": turnId,
                "turnNewDate": turnNewDate,
                "_token": "{{ csrf_token() }}"
            };

            $.ajax({
                method: 'put',
                url: '/turns/'+turnId,
                data: data,
                async: true,
                success: function(response){
                    if (response.success === "true"){
                        //alert('si');
                    }else{
                        //alert('no');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        }

        $(document).ready(function() {
            $('#calendar').fullCalendar({
                height: 550,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventDrop: function(event, delta, revertFunc) {
                    if (!confirm("Esta seguro que quiere mover el turno de "+ event.title + " a " + event.start.format('DD/MM/YYYY HH:mm:SS') +"")) {
                        revertFunc();
                    } else {
                        eventMove(event);
                    }
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function(date, jsEvent, ui, resourceId ) {
                    var patientId = $(this).data('id');
                    var turn = date.format('DD/MM/YYYY HH:mm:ss');
                    //console.debug($('#calendar').fullCalendar('clientEvents'));
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
                timeFormat: 'H:mm',
                eventClick: function(calEvent, jsEvent, view) {

                    data = {
                        "_token": "{{ csrf_token() }}"
                    };

                    $.ajax({
                        method: 'post',
                        url: '/turns/get/'+calEvent.id,
                        data: data,
                        async: true,
                        success: function(response){
                            if (response.success === "true"){
                                console.debug(response.data);
                                loadTurn(calEvent.title, response.data);
                            }else{
                                //alert('no');
                            }
                        },
                        error: function(data){

                        }
                    });

                    $('#editTurn').modal('show')
                },
                events: [
                    @foreach($turns as $turn)
                    {
                        id: {{ $turn->id }},
                        title: '{{ $turn->patient()->get()[0]->name }}',
                        start: new Date('{{ $turn->date }}'),
                        allDay: false
                    },
                    @endforeach
                ]
            });
        });
    </script>
@endsection