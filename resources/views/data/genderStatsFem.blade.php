<div id="gender-stats-f" style="width: 500px; height: 500px;"></div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['age', 'percent'],

            @php
                for ($i = 0; $i < 8; $i++) {
                    echo "['".substr($sexAge[$i]['value'], 2)."', ".$sexAge[$i]['impressions_rate']. "],";
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
            title: 'Данные по гендеру - Ж',
        };

        var chart = new google.visualization.PieChart(document.getElementById('gender-stats-f'));

        chart.draw(data, options);
    }
</script>

