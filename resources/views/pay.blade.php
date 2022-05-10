<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css?3') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js?4') }}"></script>
    <style>
        .main_pay .pay_sel input {
            background: transparent;
            color: #fff;
            margin: 0 5px;
            float: left;
            border: 1px solid #fff;
            border-radius: 5px;
            padding: 5px 5px;
            font-size: 15px;
            min-width: 130px;
        }

        ::-webkit-calendar-picker-indicator {
            background-color: #fff;
            overflow: hidden;
            border-radius: 4px;
            border: none !important;
            padding: 4px;
            box-shadow: border-box !important;
        }

    </style>
</head>

<body>
    @include('includes.header')
    <section class="home">
        <div class="container clearfix">
            @include('includes.form_profile_mob')
            <h1 class="our_clients">Купить пакеты</h1>
            <div class="main_pay">
                <div class="top_text">Выберите пакеты для пользователя:
                    <p class="user_pay">{{ $client->login }}</p>
                    <a href="#" class="see_all">Посмотреть все купленные пакеты</a>
                </div>
                <div class="warning">Активация купленных пакетов в течении 10 мин!</div>
                <div class="all_pay_table">
                    <div class="top_pay_table">
                        <div class="item name_pay">
                            <p class="name_name">Название пакета</p>
                        </div>
                        <div class="item price_pay" style="text-align: center;">
                            <p class="name_name" style="float: left">Цена в месяц</p>
                            <p class="name_name" style="float: right;margin-right:20%">Информация</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <input type="checkbox" class="check_it" />
                            <p class="name_info">VIP</p>
                        </div>
                        <div class="item price_pay" style="text-align: center;margin-bottom:20px">
                            <p class="name_info" style="float: left">$1.00</p>
                            <a href="#" class=" name_info " style="float:right;margin-right:23%;text-decoration:underline">Подробна</a>
                        </div>
                    </div>
                </div>
                <div class="pay_sel ">
                    <p>Купить выбранные с</p>
                    <input type="date">
                    <p>по</p>
                    <input type="date">
                    <p>или купить на:</p>
                    <select>
                        <option>1 месяц</option>
                        <option>2 месяця</option>
                        <option>3 месяця</option>
                        <option>4 месяця</option>
                        <option>5 месяцев</option>
                        <option>6 месяцев</option>
                        <option>1 год</option>
                    </select>
                </div>
                <div class="warning ">У вас пока нет выбранных пакетов...</div>
                <a href="# " class="btn_pay ">Купить выбранный пакет</a>
            </div>
        </div>
    </section>
    <footer>
        <div class="container clearfix ">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js " type="text/javascript "></script>
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
</body>

</html>
