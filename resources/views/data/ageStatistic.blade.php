<div id="age-statistic" style="width: 500px; height: 500px;"></div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['age', 'percent'],

            @php
                foreach($ages as $age) {
                    echo "['".$age['value']."', ".$age['impressions_rate']. "],";
                }
            @endphp
        ]);

        var options = {
            chartArea:{
                top: 50,
                left: '10%',
                width: '80%',
                height: 350
            },
            legend:{
                position:'bottom',
            },
            title: 'Данные по возрастам',
        };

        var chart = new google.visualization.PieChart(document.getElementById('age-statistic'));

        chart.draw(data, options);
    }
</script>

