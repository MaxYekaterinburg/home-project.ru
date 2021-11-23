<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/script.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=0cbe1df4-5d08-4cce-8ad9-7076f0d7832f&lang=ru_RU" type="text/javascript"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/yandex_map.js"></script>
    <title>Первая страница</title>
</head>
<body>
<div class="section-block">
    <div class="section-block__column">
        <div class="video-fon">
            <video class="video-block" autoplay muted loop poster="<?=SITE_TEMPLATE_PATH?>/image/video-poster.jpg">
                <source src="<?=SITE_TEMPLATE_PATH?>/main.mp4" type="video/mp4">
                <source src="<?=SITE_TEMPLATE_PATH?>/main.webm" type="video/webm">
            </video>
        </div>
        <header class="header">
            <div class="header__logo"><img src="<?=SITE_TEMPLATE_PATH?>/image/logo.png" draggable="false"></div>
            <nav class="header__menu">
                <ul class="header__menu-items">
                    <li>
                        <a href="#" class="header__menu__link">Front-end</a>
                    </li>
                    <li>
                        <a href="#" class="header__menu__link">Back-end</a>
                    </li>
                    <li>
                        <a href="#" class="header__menu__link">Чи</a>
                    </li>
                    <li>
                        <a href="#" class="header__menu__link">Да</a>
                    </li>
                </ul>
            </nav>
            <div class="header__lang">
                <div class="header__lang-menu">
                    <span class="header__lang__text">Русский</span>
                    <img class="header__lang__angle-down" src="<?=SITE_TEMPLATE_PATH?>/image/angle-down-solid.svg">
                </div>
            </div>
        </header>
        <div class="wrapper">
            <span class="title-videofon">Hobby</span>
            <img src="<?=SITE_TEMPLATE_PATH?>/image/first-page-videofon-centr-icon.svg" draggable="false">
            <span class="title-videofon">Work</span>
        </div>
        <div class="section-block_bottom">
            <span class="section-block_bottom-text">Сайт в разработке</span>
        </div>
    </div>
</div>
<div class="section-block">
    <div class="section-block__sliders-wrapper">
        <div class="section-block__first-sliders">
            <img class="section-block__first-sliders__slide" src="<?=SITE_TEMPLATE_PATH?>/image/for-slide1.jpg">
            <img class="section-block__first-sliders__slide" src="<?=SITE_TEMPLATE_PATH?>/image/for-slide2.jpg">
            <img class="section-block__first-sliders__slide" src="<?=SITE_TEMPLATE_PATH?>/image/for-slide3.jpg">
            <img class="section-block__first-sliders__slide" src="<?=SITE_TEMPLATE_PATH?>/image/for-slide4.jpg">
            <img class="section-block__first-sliders__slide" src="<?=SITE_TEMPLATE_PATH?>/image/for-slide5.jpg">
        </div>
        <div class="section-block__second-sliders">
            <div class="section-block__second-sliders__slide-1 slider-nav">
                <img src="<?=SITE_TEMPLATE_PATH?>/image/for-slide1_mini.jpg">
            </div>
            <div class="section-block__second-sliders__slide-2 slider-nav">
                <img src="<?=SITE_TEMPLATE_PATH?>/image/for-slide2_mini.jpg">
            </div>
            <div class="section-block__second-sliders__slide-3 slider-nav">
                <img src="<?=SITE_TEMPLATE_PATH?>/image/for-slide3_mini.jpg">
            </div>
            <div class="section-block__second-sliders__slide-4 slider-nav">
                <img src="<?=SITE_TEMPLATE_PATH?>/image/for-slide4_mini.jpg">
            </div>
            <div class="section-block__second-sliders__slide-5 slider-nav">
                <img src="<?=SITE_TEMPLATE_PATH?>/image/for-slide5_mini.jpg">
            </div>
        </div>
    </div>
</div>
<div class="section-block">
    <div class="center_for_calculator">
        <div class="calculator">
            <div class="calculator__wrapper">
                <div class="name">
                    <title>Calculator</title>
                </div>
                <div class="calculator_result">0</div>
                <div class="calculator_buttons">
                    <table>
                        <tr>
                            <td data-calc="C">C</td>
                            <td data-calc="X">X</td>
                            <td></td>
                            <td data-calc="/">/</td>
                        </tr>
                        <tr>
                            <td data-calc="7">7</td>
                            <td data-calc="8">8</td>
                            <td data-calc="9">9</td>
                            <td data-calc="*">*</td>
                        </tr>
                        <tr>
                            <td data-calc="4">4</td>
                            <td data-calc="5">5</td>
                            <td data-calc="6">6</td>
                            <td data-calc="-">-</td>
                        </tr>
                        <tr>
                            <td data-calc="1">1</td>
                            <td data-calc="2">2</td>
                            <td data-calc="3">3</td>
                            <td data-calc="+">+</td>
                        </tr>
                        <tr>
                            <td data-calc="+/-">+/-</td>
                            <td data-calc="0">0</td>
                            <td data-calc=",">,</td>
                            <td data-calc="=">=</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block">
    <div class="sect_wrapper">
        <div class="sect_input">
            <div class="sect_input__window">
                <label for="address_yandex_Map">Адрес с подсказкой</label>
                <input id="address_yandex_Map" type="text" placeholder="Введите адрес">
                <div class="alert_address_yandex_Map"></div>
                <label for="weight_yandex_Map">Вес груза, т</label>
                <input id="weight_yandex_Map" type="text" placeholder="Введите вес">
                <button class="submit_yandex_Map" type="submit">Проверить</button>
            </div>
        </div>
        <div class="sect_yandexMap">
            <div id="yandex-map_delivery">

            </div>
        </div>
        <div class="sect_output">
            <div class="sect_output__window">
                <div class="sect_output__window_result_car">
                    <span class="sect_output__window_result_car__text">Колличество машин (5т):</span>
                    <span  class="sect_output__window_result_car__result"></span>
                </div>
                <div class="sect_output__window_result_km">
                    <span class="sect_output__window_result_km__text">Колличество киллометров:</span>
                    <span  class="sect_output__window_result_km__result"></span>
                </div>
                <div class="sect_output__window_result_time">
                    <span class="sect_output__window_result_time__text">Время поездки с пробками:</span>
                    <span  class="sect_output__window_result_time__result"></span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
