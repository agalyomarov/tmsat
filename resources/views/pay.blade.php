<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        select {
            background: transparent;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 5px;
            padding: 5px 5px;
            font-size: 15px;
            min-width: 130px;
        }

    </style>
</head>

<body>
    @include('includes.header')
    <section class="home">
        <div class="container clearfix">
            @include('includes.form_profile_mob')
            {{-- <h1 class="our_clients">VIP ПАКЕТ</h1> --}}
            <div class="main_pay" style="padding-top:40px">
                <div class="warning" style="width:240px !important;margin:0 auto !important;">
                    {{-- <h1 class="our_clients"></h1> --}}
                    <h1 style="margin-bottom:10px">VIP ПАКЕТ</h1>
                    <p style="margin-bottom:5px">Цена 0.10$ за 1 месяц</p>
                    <p style="margin-bottom:5px">пакет vip</p>
                    <p style="margin-bottom:5px">В него входить</p>
                    <p style="margin-bottom:5px">Телекарта 85°</p>
                    <p style="margin-bottom:5px">НТВ+ Восток 56°</p>
                    <p style="margin-bottom:5px">D-smart 42°</p>
                    <p style="margin-bottom:5px">Setante 31°</p>
                    <p style="margin-bottom:5px">XXX chanel 13°</p>
                    <p style="margin-bottom:5px">Polsat chanel 13°</p>
                    <p style="margin-bottom:5px">NC+ chanel 13°</p>
                </div>
                <div class="select" style="width:150px;text-align:center;margin:0 auto;margin-top:20px">
                    <select class="date_for_paket">
                        <option value="1">1 месяц</option>
                        <option value="2">2 месяця</option>
                        <option value="3">3 месяця</option>
                        <option value="4">4 месяця</option>
                        <option value="5">5 месяцев</option>
                        <option value="6">6 месяцев</option>
                        <option value="12">1 год</option>
                    </select>
                </div>
                <div style="width:100%;text-align:center;margin:0 auto;margin-top:20px">
                    <p style="margin-bottom:5px;color:white">Для пользователя {{ $client->login }}</p>
                </div>
                <div class="messages" style="width:100%;text-align:center;margin:0 auto;margin-top:20px">
                    {{-- <p style="margin-bottom:5px;color:white">На вашем счету не достаточна средства</p> --}}
                </div>
                <div style="width:240px;text-align:center;margin:0 auto;margin-top:20px !important">
                    <input type="button" class="btn_pay btn_for_buy_paket" value="Купить" style="font-size:15px;font-weight:bold;margin:0 auto !important;" data-client_id="{{ $client->id }}">
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js " type="text/javascript "></script>
    <script>
        document.querySelector('.btn_for_buy_paket').addEventListener('click', function(e) {
            const messages = document.querySelector('.messages');
            messages.querySelectorAll('p').forEach(function(message) {
                message.remove();
            });
            const body = {};
            body.dateForPaket = document.querySelector('.date_for_paket').value;
            body.client_id = e.target.dataset.client_id;
            fetch('/diller/client', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify(body)
            }).then(res => {
                return res.json();
            }).then(data => {
                if (data.status == false) {
                    messages.innerHTML = `<p style="margin-bottom:5px;color:white">${data.message}</p>`;
                } else if (data.status == true) {
                    console.log(data);
                }
            });
        })
    </script>

</body>

</html>
{{-- Выберите правилную дату --}}
{{-- Общая стоимость: ${currentPrice} $ Ваш баланс: ${balanceProfile} $ | <a href='/pay_balance'>Пополнить</a> --}}
