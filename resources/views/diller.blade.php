<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="style.css?3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js?4') }}"></script>
    <style>
        .all_user .top_cap .item p,
        .all_user .item_user .item .list_btn {
            padding: 3px 5px !important;
            width: auto !important;
            /* margin-top: 20px !important; */
            display: inline-block !important;
            border-radius: 5px !important;
            color: #000 !important;
            font-weight: 500 !important;
            text-align: center !important;
            background: #45edff !important;
            border: 1px solid #45edff !important;
        }

        .all_user .item_user .item p {
            /* padding: 5px 10px !important; */
            /* width: 300px !important; */
            /* margin-top: 20px !important; */
            /* display: inline-block !important; */
            border-radius: 5px !important;
            color: #fff !important;
            font-weight: 500 !important;
            text-align: center !important;
            /* background: yellow !important; */
            border: 0px !important;
        }

        .all_user .item_user .item .list_btn:hover {
            color: #45edff !important;
            background: #000 !important;
        }

        .all_user .item_user .item .all_action p,
        .all_user .item_user .item .all_action a {
            margin-top: 5px;
            padding: 5px 10px;
            border-radius: 3px;
            border: 1px solid #45edff !important;
        }

        .all_user .item_user .item .all_action p:hover,
        .all_user .item_user .item .all_action a:hover {
            color: #000 !important;
            background: #45edff !important;
        }

    </style>
</head>

<body>
    @include('includes.header')

    <section class="home">
        <div class="container clearfix">
            @include('includes.form_profile_mob')
            <h1 class="our_clients">Наши клиенты</h1>
            @include('includes.form_profile')
            <form class="search_user">
                <a href="create_cliente.html" class="add_btn">Добавить клиента</a>
                <input type="text" placeholder="Введите имя пользователя" />
                <a href="#" class="search">Поиск</a>
            </form>
            <div class="main_all_user">
                <div class="active_user">149</div>
                <div class="num_single">
                    <select class="count_clients">
                        <option value="10" {{ $count == 10 ? 'selected' : '' }}>10</option>
                        <option value="100" {{ $count == 100 ? 'selected' : '' }}>100</option>
                        <option value="1000" {{ $count == 1000 ? 'selected' : '' }}>1000</option>
                    </select>
                </div>
                <div class="all_user">
                    <div class="top_cap">
                        <div class="item check_item">
                            <input type="checkbox" class="check_it" />
                        </div>
                        <div class="item login_item">
                            <p class="name_name">Логин</p>
                        </div>
                        <div class="item pass_item">
                            <p class="name_name">Пароль</p>
                        </div>
                        <div class="item server_item">
                            <p class="name_name">Сервер</p>
                        </div>
                        <div class="item notific_item">
                            <p class="name_name">Заметка</p>
                        </div>
                        <div class="item day_item">
                            <p class="name_name">Действует до</p>
                        </div>
                        <div class="item packet_item">
                            <p class="name_name">Пакет</p>
                        </div>
                        <div class="item btn_item">
                            <p class="name_name">Действия</p>
                        </div>
                    </div>
                    {{-- <div class="item_user ended">
                        <div class="item check_item">
                            <input type="checkbox" class="check_it" />
                        </div>
                        <div class="item login_item">
                            <p class="name_info">Vlad_1997</p>
                        </div>
                        <div class="item pass_item">
                            <p class="name_info">Qwerty123</p>
                        </div>
                        <div class="item server_item">
                            <p class="name_info">1</p>
                        </div>
                        <div class="item notific_item">
                            <p class="name_info">sdfdsf d sf</p>
                        </div>
                        <div class="item day_item">
                            <p class="name_info">10.02.22</p>
                        </div>
                        <div class="item packet_item">
                            <p class="name_info">Телекарта 85е</p>
                        </div>
                        <div class="item btn_item">
                            <div class="list_btn">Действия</div>
                            <div class="all_action">
                                <a href="#">Изменить</a>
                                <a href="#">Удалить</a>
                                <a href="pay.html">Купить</a>
                                <a href="#">Остановит</a>
                            </div>
                        </div>
                    </div>
                    <div class="item_user">
                        <div class="item check_item">
                            <input type="checkbox" class="check_it" />
                        </div>
                        <div class="item login_item">
                            <p class="name_info">Vlad_1997</p>
                        </div>
                        <div class="item pass_item">
                            <p class="name_info">Qwerty123</p>
                        </div>
                        <div class="item server_item">
                            <p class="name_info">1</p>
                        </div>
                        <div class="item notific_item">
                            <p class="name_info">sdfdsf d sf</p>
                        </div>
                        <div class="item day_item">
                            <p class="name_info">13.02.22</p>
                        </div>
                        <div class="item packet_item">
                            <p class="name_info">Телекарта 85е</p>
                        </div>
                        <div class="item btn_item">
                            <div class="list_btn">Действия</div>
                            <div class="all_action">
                                <a href="#">Изменить</a>
                                <a href="#">Удалить</a>
                                <a href="pay.html">Купить</a>
                                <a href="#">Остановит</a>
                            </div>
                        </div>
                    </div>
                    <div class="item_user active">
                        <div class="item check_item">
                            <input type="checkbox" class="check_it" />
                        </div>
                        <div class="item login_item">
                            <p class="name_info">Vlad_1997</p>
                        </div>
                        <div class="item pass_item">
                            <p class="name_info">Qwerty123</p>
                        </div>
                        <div class="item server_item">
                            <p class="name_info">1</p>
                        </div>
                        <div class="item notific_item">
                            <p class="name_info">sdfdsf d sf</p>
                        </div>
                        <div class="item day_item">
                            <p class="name_info">04.03.22</p>
                        </div>
                        <div class="item packet_item">
                            <p class="name_info">Телекарта 85е</p>
                        </div>
                        <div class="item btn_item">
                            <div class="list_btn">Действия</div>
                            <div class="all_action">
                                <a href="#">Изменить</a>
                                <a href="#">Удалить</a>
                                <a href="pay.html">Купить</a>
                                <a href="#">Остановит</a>
                            </div>
                        </div>
                    </div>
                    <div class="item_user">
                        <div class="item check_item">
                            <input type="checkbox" class="check_it" />
                        </div>
                        <div class="item login_item">
                            <p class="name_info">Vlad_1997</p>
                        </div>
                        <div class="item pass_item">
                            <p class="name_info">Qwerty123</p>
                        </div>
                        <div class="item server_item">
                            <p class="name_info">1</p>
                        </div>
                        <div class="item notific_item">
                            <p class="name_info">sdfdsf d sf</p>
                        </div>
                        <div class="item day_item">
                            <p class="name_info">04.01.22</p>
                        </div>
                        <div class="item packet_item">
                            <p class="name_info">Телекарта 85е</p>
                        </div>
                        <div class="item btn_item">
                            <div class="list_btn">Действия</div>
                            <div class="all_action">
                                <a href="#">Изменить</a>
                                <a href="#">Удалить</a>
                                <a href="pay.html">Купить</a>
                                <a href="#">Остановит</a>
                            </div>
                        </div>
                    </div> --}}
                    @if (isset($clients) && count($clients) > 0)
                        @foreach ($clients as $client)
                            <div class="item_user" data-client_id={{ $client->id }} data-login={{ $client->login }} data-parol={{ $client->parol }} data-server={{ $client->server }} data-description={{ $client->description }}>
                                <div class="item check_item">
                                    <input type="checkbox" class="check_it" />
                                </div>
                                <div class="item login_item">
                                    <p class="name_info">{{ $client->login }}</p>
                                </div>
                                <div class="item pass_item">
                                    <p class="name_info">{{ $client->parol }}</p>
                                </div>
                                <div class="item server_item">
                                    <p class="name_info">{{ $client->server }}</p>
                                </div>
                                <div class="item notific_item">
                                    <p class="name_info">{{ $client->description }}</p>
                                </div>
                                <div class="item day_item">
                                    <p class="name_info">{{ $client->end_date }}</p>
                                </div>
                                <div class="item packet_item">
                                    <p class="name_info">{{ $client->paket }}</p>
                                </div>
                                <div class="item btn_item">
                                    <div class="list_btn">Действия</div>
                                    <div class="all_action">
                                        <p class="change_client_data">Изменить</p>
                                        <p class="delete_client">Удалить</p>
                                        <a href="{{ route('diller.buyPaket', $client->id) }}">Купить</a>
                                        <p>Остановит</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="notted_single">
                    <select>
                        <option>Купить пакеты</option>
                        <option>Сервер переполнен</option>
                        <option>Ваш текст</option>
                    </select>
                    <a href="#" class="install">Применить</a>
                </div>
                <div class="notted_single">
                    <select>
                        <option>Продлить на 1 месяц</option>
                        <option>Продлить на 2 месяца</option>
                        <option>Продлить на 3 месяца</option>
                        <option>Продлить на 4 месяца</option>
                        <option>Продлить на 5 месяцев</option>
                        <option>Продлить на 6 месяцев</option>
                        <option>Продлить на 1 год</option>
                    </select>
                    <a href="#" class="install">Применить</a>
                </div>
            </div>
        </div>
    </section>
    <div class="profile_edit">

        <span class="cansel"></span>
        <p class="title">Введите данные</p>

        <form action="#" method="post" class="form_add_client">
            @csrf
            <label>
                <span class="name_profile_edit">Логин</span>
                <input type="text" placeholder="Введите логин" name="login" />
            </label>
            <label>
                <span class=" name_profile_edit">Пароль</span>
                <input type="text" placeholder="Введите пароль" name="parol" />
            </label>
            <label>
                <span class=" name_profile_edit">Сервер</span>
                <select name="server">
                    <option value=""></option>
                    <option value="1">Туркменистан s1.tmsat.live</option>
                    <option value="2">Туркменистан s2.tmsat.live</option>
                    <option value="3">Туркменистан s3.tmsat.live</option>
                    <option value="4">Туркменистан s4.tmsat.live</option>
                    <option value="5">Туркменистан s5.tmsat.live</option>
                    <option value="6">Туркменистан s6.tmsat.live</option>
                    <option value="7">Туркменистан s7.tmsat.live</option>
                    <option value="8">Туркменистан s8.tmsat.live</option>
                    <option value="9">Туркменистан s9.tmsat.live</option>
                </select>
            </label>
            <label>
                <span class="name_profile_edit">Заметки</span>
                <input type="text" name="description">
            </label>
            <input type="button" class="btn add_client" value="Создать" style="padding: 5px 5px;font-size:14px">
        </form>
    </div>
    <div class="black_fon"></div>
    <footer>
        <div class="container clearfix">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
    <script>
        document.querySelector('.search_user .add_btn').addEventListener('click', function(e) {
            const profileEdit = document.querySelector('.profile_edit');
            const formAddClient = profileEdit.querySelector('.form_add_client');
            formAddClient.querySelector('input[name="login"]').value = '';
            formAddClient.querySelector('input[name="parol"]').value = '';
            formAddClient.querySelector('select[name="server"]').value = '';
            formAddClient.querySelector('input[name="description"]').value = '';
            profileEdit.querySelectorAll('.validate_message').forEach(function(element) {
                element.remove();
            });
            formAddClient.querySelector('input.add_client').remove();
            formAddClient.insertAdjacentHTML('beforeend', '<input type="button" class="btn add_client" value="Создать" style="padding: 5px 5px;font-size:14px">');
            const btnAddClient = formAddClient.querySelector('input.add_client');
            const mainUsers = document.querySelector('.main_all_user');
            btnAddClient.addEventListener('click', function(e) {
                const formAddClient = btnAddClient.closest('form.form_add_client');
                const profileEdit = document.querySelector('.profile_edit');
                profileEdit.querySelectorAll('.validate_message').forEach(function(element) {
                    element.remove();
                })
                const body = {};
                body.login = formAddClient.querySelector('input[name="login"]').value;
                body.parol = formAddClient.querySelector('input[name="parol"]').value;
                body.server = formAddClient.querySelector('select[name="server"]').value;
                body.description = formAddClient.querySelector('input[name="description"]').value;
                fetch('/diller/create_client', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    return res.json();
                }).then(data => {
                    if (data.status == 'validate_error') {
                        for (let key in data.messages) {
                            profileEdit.insertAdjacentHTML('afterbegin', `<p class="validate_message" style="color:white;padding:0 20px;margin-bottom:5px;">${data.messages[key]}</p>`)
                        }
                    } else if (data.status == true) {
                        window.location.reload();
                    } else if (data.status == false) {
                        profileEdit.insertAdjacentHTML('afterbegin', `<p class="validate_message" style="color:white;padding:0 20px;margin-bottom:5px;">${data.message}</p>`)
                    }
                })
            })
        })
        document.querySelector('.count_clients').addEventListener('change', function(e) {
            window.location = `/diller?count=${e.target.value}`;
        });
        const mainUsers = document.querySelector('.main_all_user');
        mainUsers.addEventListener('click', function(e) {
            if (e.target.classList.contains('change_client_data')) {
                const profileEdit = document.querySelector('.profile_edit');
                const black_fon = document.querySelector('.black_fon');
                const formAddClient = profileEdit.querySelector('.form_add_client');
                const itemUser = e.target.closest('.item_user');
                formAddClient.querySelector('input[name="login"]').value = itemUser.dataset.login;
                formAddClient.querySelector('input[name="parol"]').value = itemUser.dataset.parol;
                formAddClient.querySelector('select[name="server"]').value = itemUser.dataset.server;
                formAddClient.querySelector('input[name="description"]').value = itemUser.dataset.description;
                profileEdit.classList.add('active');
                black_fon.classList.add('active');
                profileEdit.querySelectorAll('.validate_message').forEach(function(element) {
                    element.remove();
                });
                formAddClient.querySelector('input.add_client').remove();
                formAddClient.insertAdjacentHTML('beforeend', '<input type="button" class="btn add_client" value="Изменит" style="padding: 5px 5px;font-size:14px">');
                const btnAddClient = formAddClient.querySelector('input.add_client');
                btnAddClient.addEventListener('click', function(event) {
                    profileEdit.querySelectorAll('.validate_message').forEach(function(element) {
                        element.remove();
                    })
                    const body = {};
                    body.client_id = itemUser.dataset.client_id;
                    body.login = formAddClient.querySelector('input[name="login"]').value;
                    body.parol = formAddClient.querySelector('input[name="parol"]').value;
                    body.server = formAddClient.querySelector('select[name="server"]').value;
                    body.description = formAddClient.querySelector('input[name="description"]').value;
                    fetch('/diller/update_client', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify(body)
                    }).then(res => {
                        return res.json();
                    }).then(data => {
                        if (data.status == 'validate_error') {
                            for (let key in data.messages) {
                                profileEdit.insertAdjacentHTML('afterbegin', `<p class="validate_message" style="color:white;padding:0 20px;margin-bottom:5px;">${data.messages[key]}</p>`)
                            }
                        } else if (data.status == true) {
                            window.location.reload();
                            // console.log(data);
                        } else if (data.status == false) {
                            profileEdit.insertAdjacentHTML('afterbegin', `<p class="validate_message" style="color:white;padding:0 20px;margin-bottom:5px;">${data.message}</p>`)
                        }
                    })
                    // console.log(body);
                })
            } else if (e.target.classList.contains('delete_client')) {
                const check = confirm('Вы точно хотите удалить клиента?');
                if (check) {
                    const itemUser = e.target.closest('.item_user');
                    const body = {};
                    body.client_id = itemUser.dataset.client_id;
                    fetch('/diller/delete_client', {
                        method: 'delete',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify(body)
                    }).then(res => {
                        return res.json();
                    }).then(data => {
                        if (data.status == true) {
                            window.location.reload();
                            // console.log(data);
                        } else if (data.status == false) {
                            alert(data.message);
                        }
                    })
                }
            }
        })
    </script>
</body>

</html>
