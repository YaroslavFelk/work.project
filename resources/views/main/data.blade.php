
@isset( $demographic)
    <div class="data">
        @include('data.ageStatistic', [ 'ages' => $demographic['response'][0]['stats'][0]['age']])
        @include('data.genderStatsFem', [ 'sexAge' => $demographic['response'][0]['stats'][0]['sex_age']])
        @include('data.genderStatsMale', [ 'sexAge' => $demographic['response'][0]['stats'][0]['sex_age']])

                <pre>
                                {{var_dump($demographic['response'][0]['stats'][0]["cities"])}}
                </pre>

    <div id="map" style="width: 1000px; height: 500px"></div>
    <script src="http://api-maps.yandex.ru/2.1?apikey=b9e6d592-8dc7-434c-ae60-1947e3220a4d&lang=ru-RU&coordorder=longlat" type="text/javascript"></script>
    <script type="text/javascript">
        var myMap;
        ymaps.ready(init); // Ожидание загрузки API с сервера Яндекса
        function init () {

            myMap = new ymaps.Map("map", {
                center: [37.64, 55.76 ], // Координаты центра карты
                zoom: 4 // Zoom
            });

            let cities = <?= json_encode($demographic['response'][0]['stats'][0]["cities"])?>;
            var url = "http://nominatim.openstreetmap.org/search";

            cities.forEach ( city => {
                $.getJSON(url, {q: city.name, format: "json", polygon_geojson: 1})
                    .then(function (data) {
                        var p = new ymaps.Polygon(data[0].geojson.coordinates, {
                            // Описываем свойства геообъекта.
                            // Содержимое балуна.
                            hintContent: "Многоугольник"
                        }, {
                            // Задаем опции геообъекта.
                            // Цвет заливки.
                            fillColor: '#00FF0088',
                            // Ширина обводки.
                            strokeWidth: 5
                        });
                        myMap.geoObjects.add(p);

                        var myPlacemark = new ymaps.Placemark([data[0].lon, data[0].lat], {

                            iconContent: `
                                ${city.name}: \n\n
                                ${city.impressions_rate ? `просмотры-` + (city.impressions_rate * 100).toFixed(2) + '% \r\n' : ''}
                                ${city.clicks_rate ? `клики-` + (city.clicks_rate * 100).toFixed(2) + '%' : ''}
                                `
                            ,
                        }, {
                            preset: 'islands#blueStretchyIcon',
                        });
                        myMap.geoObjects.add(myPlacemark);
                    }, function (err) {
                        console.log(err)
                    });
            })
            // Вспомогательный класс, который можно использовать
// вместо GeoObject c типом геометрии «Point» (см. предыдущий пример)


            // var myGeocoder = ymaps.geocode("Moscow");
            // myGeocoder.then(function(res) {
            //     myMap.geoObjects.add(res.geoObjects[0]);
            // }),
            //     function (err) {
            //         console.log(err)
            //     };
         }
    </script>
@endisset
