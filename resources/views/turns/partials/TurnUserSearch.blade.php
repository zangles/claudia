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

@section('scripts')
    @parent()

    <script>
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
    </script>
@endsection