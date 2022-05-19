<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('./slick/slick.css') }}">
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
    <link rel="stylesheet" type="text/css" href="{{ asset('./slick/slick-theme.css') }}">
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css?1') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js?2') }}"></script>
</head>

<body>
    @include('includes.header')

    <section class="home">
        <div class="container clearfix">
            @include('includes.form_profile_mob')

            <div class="workload_main">
                <div class="item_workload">
                    <p class="name_work left">Сервер</p>
                    <p class="sum_work right">Загрузка</p>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[1]) ? $data[1] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[1]) ? $data[1] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[2]) ? $data[2] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[2]) ? $data[2] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[3]) ? $data[3] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[3]) ? $data[3] : 0 }}%"></div>
                    </div>
                </div>


                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[4]) ? $data[4] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[4]) ? $data[4] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[5]) ? $data[5] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[5]) ? $data[5] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[6]) ? $data[6] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[6]) ? $data[6] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[7]) ? $data[7] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[7]) ? $data[7] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[8]) ? $data[8] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[8]) ? $data[8] : 0 }}%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work">{{ isset($data[9]) ? $data[9] : 0 }}%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:{{ isset($data[9]) ? $data[9] : 0 }}%"></div>
                    </div>
                </div>

                <div class="info_server_main">
                    <p class="info_server all">{{ $aktiveClients }}</p>
                    {{-- <p class="info_server day">154</p>
                    <p class="info_server week">2911</p> --}}
                </div>
            </div>
        </div>
    </section>
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
