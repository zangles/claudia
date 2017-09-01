@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4 col-xs-6">
            <h2>Turnos</h2>
        </div>
        <div class="col-sm-8 col-xs-6">
            <div class="title-action">
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
                @include('turns.partials.calendar', ['turns' => $turns])

            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection