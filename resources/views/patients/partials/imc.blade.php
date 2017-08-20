<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>IMC - {{ $patient->getIMC() }} ( {{ $patient->getIMCText() }} )</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div style="width:100%;">
            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        var barData = {
            labels: ["IMC"],
            datasets: [
                {
                    label: "IMC",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [{{ $patient->getIMC() }}]
                }
            ]
        };

        var barOptions = {
            responsive: true,
            scales: {
                xAxes: [{
                    ticks: {
                        min: 10,
                        max: 50
                    }
                }]
            }
        };

        var ctx2 = document.getElementById("barChart").getContext("2d");
        new Chart(ctx2, {type: 'horizontalBar', data: barData, options:barOptions});

    </script>
@endsection