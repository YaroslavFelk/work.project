
@if( $demographic)
    <div class="data">
        <div class="gender">
            <canvas  id="gender" width="600" height="400"></canvas>
        </div>

        <script>
            var data = {!! json_encode($demographic) !!};

            let ageArr = [];
            let impressionsArr = []
            let clicksArr = []

            data.response[0].stats[0].age.map( (age) => {
                ageArr = [...ageArr, age.value]
                impressionsArr = [...impressionsArr, age.impressions_rate * 100]
                clicksArr = [...clicksArr, age.clicks_rate * 100]

            })

            var oilCanvas = document.getElementById("gender");

            var oilData = {
                labels: ageArr,
                datasets: [
                    {
                        data: impressionsArr,
                        backgroundColor: [
                            "#FF6384",
                            "#63FF84",
                            "#84FF63",
                            "#8463FF",
                            "#6384FF",
                            "#000",
                            "orange",
                            "yellow"
                        ]
                    }]
            };

            var pieChart = new Chart(oilCanvas, {
                type: 'pie',
                data: oilData,
                options: {
                    legend: {
                        display: false,
                        labels: {
                            fontColor: 'rgb(255, 99, 132)'
                        }
                    }
                }
            });
        </script>
    </div>

@endif
