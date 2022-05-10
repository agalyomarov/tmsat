<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" type="{{ asset('text/css" href="slick/slick.css') }}">
    <link rel="stylesheet" type="{{ asset('text/css" href="slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css?1') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js?2') }}"></script>
    <title></title>
</head>

<body>
    @include('includes.header')
    <section class="home">
        <div class="black_fix"></div>
        <div class="container clearfix">
            @include('includes.form_profile_mob')
            <div class="sliderHome">
                <div class="item">
                    <p class="title">Пакет VIP All более 1000 каналов SD+HD 0.20$/мес.</p>
                    <p class="text">Каналы провайдеров СНГ и Европы</p>
                    <a href="#" class="btn">Перейти в профиль</a>
                </div>
                <div class="item">
                    <p class="title">Мы работаем, чтобы Вы отдыхали!</p>
                    <p class="text">Более 10 лет на рынке•сервера с защитой от DDOS атак</p>
                    <a href="#" class="btn">Перейти в профиль</a>
                </div>
                <div class="item">
                    <p class="title">Кардшаринг — </p>
                    <p class="text">это возможность смотреть множество спутниковых каналов по доступной цене!</p>
                    <a href="#" class="btn">Перейти в профиль</a>
                </div>
            </div>
        </div>
    </section>
    <section class="advantage">
        <div class="container clearfix">
            <div class="advantage_main">
                <div class="item">
                    <div class="logo">
                        <img src="img/antenna.png" />
                    </div>
                    <p class="text">
                        Возможность подключения любого пакета услуг по доступной цене.
                    </p>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="img/support.png" />
                    </div>
                    <p class="text">
                        Техническая поддержка и консультации специалистов нашей компании.
                    </p>
                </div>
                <div class="item">
                    <div class="logo">
                        <img src="img/control.png" />
                    </div>
                    <p class="text">
                        Огромный выбор спутниковых каналов высокого качества трансляций.
                    </p>
                </div>
            </div>
            <h1 class="title_name"><span>Наши преимущества</span></h1>
            <div class="all_advantage_main">
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/all_world.png" />
                        </div>
                        <div class="text_text">
                            <p class="title">Возможность</p>
                            <p class="sub_sub">Возможность подключения любого пакета услуг</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/all_support.png" />
                        </div>
                        <div class="text_text">
                            <p class="title">Поддержка</p>
                            <p class="sub_sub">Техническая поддержка и консультации специалистов нашей компании</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/all_choice.png" />
                        </div>
                        <div class="text_text">
                            <p class="title">Неограниченность</p>
                            <p class="sub_sub">Огромный выбор спутниковых каналов</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/all_pay.png" />
                        </div>
                        <div class="text_text">
                            <p class="title">Доступность</p>
                            <p class="sub_sub">Низкая абонентская плата</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/all_trafic.png" />
                        </div>
                        <div class="text_text">
                            <p class="title">Экономность</p>
                            <p class="sub_sub">Небольшой расход интернет-трафика</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/all_quality.png" />
                        </div>
                        <div class="text_text">
                            <p class="title">Качество</p>
                            <p class="sub_sub">Высочайшее качество трансляции</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="used">
        <div class="container clearfix">
            <h1 class="title_name"><span>Что нужно для использования?</span></h1>
            <div class="main">
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/antenna_used.png" />
                        </div>
                        <span class="num">1</span>
                    </div>
                    <p>Спутниковая тарелка</p>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/decoder_used.png" />
                        </div>
                        <span class="num">2</span>
                    </div>
                    <p>Декодер с поддержкой кардшаринга</p>
                </div>
                <div class="item">
                    <div class="item_item">
                        <div class="logo_logo">
                            <img src="img/web_used.png" />
                        </div>
                        <span class="num">3</span>
                    </div>
                    <p>Стабильный доступ в интернет</p>
                </div>
            </div>
        </div>
    </section>
    <section class="join">
        <div class="container clearfix">
            <div class="main">
                <p class="text">Присоединяйтесь к нам!</p>
                <a href="#" class="btn">Кабинет</a>
            </div>
        </div>
    </section>
    <section class="bottom">
        <div class="container clearfix">
            <div class="main">
                <p class="title">
                    Что такое кардшаринг
                </p>
                <p class="text">
                    Кардшаринг — это метод, позволяющий смотреть закрытые каналы спутникового телевидения нескольким пользователям одновременно. Раскодируются они с помощью одной официальной карты доступа, располагающейся на специальном сервере кардшаринга. Другими словами,
                    кардшаринг означает совместное использование карты спутникового ТВ.
                </p>
            </div>
        </div>
    </section>
    </section>
    <div class="top_scroll"></div>
    <footer>
        <div class="container clearfix">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
    <script src="{{ asset('slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
</body>

</html>
