<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Grafico evolucion peso</h5>
    </div>
    <div class="ibox-content">
        <div style="width:100%;">
            <canvas id="lineChart"></canvas>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        var wHistory = JSON.parse('{!! $weightHistory  !!}');

        var chartDates = [];
        var chartValues = [];
        var minW = 9999;
        var maxW = 0;
        $.each(wHistory, function (k, v) {
            chartDates.push(v.updated_at);
            chartValues.push(v.value);
            if (v.value > maxW) {
                maxW = v.value;
            }

            if (v.value < minW) {
                minW = v.value;
            }
        });

        var lineData = {
            labels: chartDates,
            datasets: [
                {
                    label: "Peso",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: chartValues
                }
            ]
        };


        var lineOptions = {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        min: minW - (minW*5/100),
                        max: maxW + (maxW*5/100)
                    }
                }]
            }
        };

        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
    </script>
@endsection