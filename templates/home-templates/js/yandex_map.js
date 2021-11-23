ymaps.ready(function () {

    // Построение маршрута с учетом пробок.
    var myMap = new ymaps.Map('yandex-map_delivery', {
        center: [56.838612, 60.603412],
        zoom: 12,
        controls: ['zoomControl'],
        behaviors: ['drag']
    });

    // При клике по кнопку запускаем проверку наличия геообъектов
    $('.submit_yandex_Map').bind('click', function (e) {
        if(myMap.geoObjects.getLength() > 0){
            myMap.geoObjects.removeAll();
        }
        geocode();
    });
    //boundedBy предлагает сначала названия внутри прямоугольника (выбрана Россия),
    //подсказки по нужным адресам определённых стран можно сделать несколькими способами:
    //1) Невидимо для пользователя добавлять в поисковую строку "Россия, ", но мы всё равно сможем найти что-нибудь вне России
    //2) Менять провайдер поисковых подсказок (но в основном бесплатные имеют ограничения и ищут только по России/Белорусии)
    //3) Показывать дефолтные подсказки, но отслеживать страну в строке и добавлять стилизацию на сайте, при выборе (мой вариант)
    var suggestView2 = new ymaps.SuggestView('address_yandex_Map', {boundedBy: [[74.959392, 22.324219], [37.020098, 194.238281]]});

    function geocode() {
        //Поисковая строка вне карты
        let suggestAppoint = $('#address_yandex_Map').val();
        console.log(suggestAppoint);
        if(suggestAppoint != "") {
            //Для доставки по России
            ymaps.geocode(suggestAppoint).then(function (res) {
                var obj = res.geoObjects.get(0), error, hint;
                if (obj) {
                    // Об оценке точности ответа геокодера можно прочитать тут: https://tech.yandex.ru/maps/doc/geocoder/desc/reference/precision-docpage/
                    switch (obj.properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.CountryNameCode')) {
                        case 'RU':
                            break;
                        default:
                            error = 'К сожалению в эту страну доставка не оказывается';
                            hint = 'Доставка возможна в России';
                    }
                } else {
                    error = 'Адрес не найден';
                    hint = 'Уточните адрес';
                }
                // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
                if (error || hint) {
                    $(".alert_address_yandex_Map").text(error);
                    alert(hint);
                } else {
                    $(".alert_address_yandex_Map").text("");
                    showResult(obj);
                }
            }, function (e) {
                console.log(e)
            });
        }else{
            alert("Укажите адрес");
        }

        function showResult(obj){
            //добавляем 2 точки для маршрута
            ymaps.route(['Екатеринбург, Площадь 1905 года', obj.getAddressLine()], {
                mapStateAutoApply: true,
                avoidTrafficJams: true
            }).then(
                function (route) {
                    // добавляем маршрут на карту
                    myMap.geoObjects.add(route);
                    //стилизуем и наполняем метки
                    route.getWayPoints().get(0).properties.set('iconContent', 'Выезд с нашего склада');
                    route.getWayPoints().get(1).properties.set('iconContent', 'Пункт назначения');
                    route.getWayPoints().options.set('preset', 'islands#blueStretchyIcon');
                    route.getPaths().options.set('preset', 'router#plainPath');
                    //вставляем колличество: машин, км, времени
                    var travelTime = route.properties._data.RouterRouteMetaData.JamsTime.text;
                    var travelDistance = route.properties._data.RouterRouteMetaData.Length.text;

                    $(".sect_output__window_result_car__result").text();
                    $(".sect_output__window_result_km__result").text(travelDistance);
                    $(".sect_output__window_result_time__result").text(travelTime);
                },
                function (error) {
                    console.log("Возникла ошибка: " + error.message);
                }
            );
        }
        //вставляем колличество машин
        var weight_for_trans = $("#weight_yandex_Map").val();
        if(weight_for_trans != ""){
            let travelCountCar = Math.ceil(weight_for_trans / 5);
            $(".sect_output__window_result_car__result").text(travelCountCar);
        }
    }
});
