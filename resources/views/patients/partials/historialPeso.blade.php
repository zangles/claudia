<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Pesos</h5>
    </div>
    <div class="ibox-content">
        <table class="table">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Peso</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($patient->getWeights() as $k => $v)
                <tr>
                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v->updated_at)->format('d/m/Y') }}</td>
                    <td>{{ $v->value }}</td>
                    <td>
                        <div class="col-md-2">
                            @if (count($patient->getWeights()) > 1)
                                <form action="{{ route('patient.measure.destroy', $v) }}" id="deleteWeightForm-{{ $v->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger deleteWeight" data-id="{{ $v->id }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(".deleteWeight").click(function(){
            var id = $(this).data('id');
            if (confirm ('Esta seguro que desea eliminar esta medida?')) {
                $("#deleteWeightForm-"+id).submit();
            }
            return false;
        });
    </script>
@endsection