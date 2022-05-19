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
    <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js?4') }}"></script>
    <style>
        .all_user .top_cap .item p,
        .all_user .item_user .item .list_btn {
            padding: 2px 2px !important;
            width: auto !important;
            /* margin-top: 20px !important; */
            display: inline-block !important;
            border-radius: 3px !important;
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
            font-size: 16px !important;
        }

        .all_user .item_user .item .all_action p:hover,
        .all_user .item_user .item .all_action a:hover {
            color: #000 !important;
            background: #45edff !important;
            font-size: 16px !important;
        }

        .paginate {
            width: 150px;
            height: 40px;
            color: #fff;
            float: right;
            /* line-height: 30px; */
        }

        @media (max-width:769px) {
            .paginate {
                width: 100%;
                margin-top: 30px;
            }
        }

        .paginate i#prevPage {
            width: 28px;
            height: 28px;
            border: 1px solid #fff;
            border-radius: 5px;
            text-align: center;
            line-height: 28px;
            font-size: 18px;
            margin: 0 5px;
        }

        .paginate i#nextPage {
            width: 28px;
            height: 28px;
            border: 1px solid #fff;
            border-radius: 5px;
            text-align: center;
            line-height: 28px;
            font-size: 18px;
            margin: 0 5px;

        }

        .paginate span {
            display: inline-block;
            width: 28px;
            height: 28px;
            border: 1px solid #fff;
            border-radius: 5px;
            text-align: center;
            line-height: 28px;
            font-size: 18px;
            margin: 0 5px;

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
                <input type="text" placeholder="Введите имя пользователя" id="inputForSearchClients" name="search" value="{{ $search }}">
                <button class=" search" id="btnForSearchClients">Поиск</button>
            </form>
            <div class="main_all_user">
                <div class="active_user">{{ $activeClient }} ({{ $countAllClients }})</div>
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
                            <input type="checkbox" class="check_it " id="checkBoxForAllUser">
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
                            <p class="name_name">Окончание</p>
                        </div>
                        <div class="item btn_item">
                            <p class="name_name">Действия</p>
                        </div>
                    </div>
                    @if (isset($clients) && count($clients) > 0)
                        @foreach ($clients as $client)
                            <div class="item_user @if ($client->end_date && strtotime($client->end_date) > strtotime(Date::now()) + 259200) active @endif @if ($client->end_date && strtotime($client->end_date) <= strtotime(Date::now()) + 259200) ended @endif" data-client_id={{ $client->id }} data-login={{ $client->login }} data-parol={{ $client->parol }} data-server={{ $client->server }}
                                data-description={{ $client->description }}>
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
                                    <p class="name_info">{{ $client->end_date ? Date::parse($client->end_date)->format('d.m.Y') : '' }}</p>
                                </div>
                                <div class="item btn_item">
                                    <div class="list_btn">Действия</div>
                                    <div class="all_action">
                                        <p class="change_client_data">Изменить</p>
                                        <p class="delete_client">Удалить</p>
                                        <a href="{{ route('diller.buyPaket', $client->id) }}">Купить</a>
                                        <p class="btn_stop_paket">Остановит</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="notted_single">
                    <select class="selectForAllClients">
                        <option value="1" {{ isset($data[1]) ? 'disabled' : '' }}>#1СЕРВЕР</option>
                        <option value="2" {{ isset($data[2]) ? 'disabled' : '' }}>#2СЕРВЕР</option>
                        <option value="3" {{ isset($data[3]) ? 'disabled' : '' }}>#3СЕРВЕР</option>
                        <option value="4" {{ isset($data[4]) ? 'disabled' : '' }}>#4СЕРВЕР</option>
                        <option value="5" {{ isset($data[5]) ? 'disabled' : '' }}>#5СЕРВЕР</option>
                        <option value="6" {{ isset($data[6]) ? 'disabled' : '' }}>#6СЕРВЕР</option>
                        <option value="7" {{ isset($data[7]) ? 'disabled' : '' }}>#7CЕРВЕР</option>
                        <option value="8" {{ isset($data[8]) ? 'disabled' : '' }}>#8СЕРВЕР</option>
                        <option value="9" {{ isset($data[9]) ? 'disabled' : '' }}>#9СЕРВЕР</option>
                    </select>
                    <span class="install" id="setServerAllUser">Применить</span>
                </div>
                <div class="notted_single" style="overflow:hidden;padding-right: 3px">
                    <select class="selectPaketForAllUser">
                        <option value="1">Продлить на 1 месяц</option>
                        <option value="2">Продлить на 2 месяца</option>
                        <option value="3">Продлить на 3 месяца</option>
                        <option value="4">Продлить на 4 месяца</option>
                        <option value="5">Продлить на 5 месяцев</option>
                        <option value="6">Продлить на 6 месяцев</option>
                        <option value="12">Продлить на 1 год</option>
                    </select>
                    <span class="install" id="buyPaketForAllUser">Применить</span>
                    @if ($count == 1000)
                        <div class="paginate">
                            <i data-url="{{ $clients->previousPageUrl() ?? 'diller?page=' }}&search={{ $search }}&count={{ $count }}" id="prevPage" class="fa-solid fa-angle-left"></i>
                            <span>{{ $clients->currentPage() }}</span>
                            <i data-url="{{ $clients->nextPageUrl() ?? 'diller?page=' }}&search={{ $search }}&count={{ $count }}" id="nextPage" class="fa-solid fa-angle-right"></i>
                        </div>
                    @endif
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
                    <option value="1" {{ isset($data[1]) ? 'disabled' : '' }}>Туркменистан s1.tmsat.live</option>
                    <option value="2" {{ isset($data[2]) ? 'disabled' : '' }}>Туркменистан s2.tmsat.live</option>
                    <option value="3" {{ isset($data[3]) ? 'disabled' : '' }}>Туркменистан s3.tmsat.live</option>
                    <option value="4" {{ isset($data[4]) ? 'disabled' : '' }}>Туркменистан s4.tmsat.live</option>
                    <option value="5" {{ isset($data[5]) ? 'disabled' : '' }}>Туркменистан s5.tmsat.live</option>
                    <option value="6" {{ isset($data[6]) ? 'disabled' : '' }}>Туркменистан s6.tmsat.live</option>
                    <option value="7" {{ isset($data[7]) ? 'disabled' : '' }}>Туркменистан s7.tmsat.live</option>
                    <option value="8" {{ isset($data[8]) ? 'disabled' : '' }}>Туркменистан s8.tmsat.live</option>
                    <option value="9" {{ isset($data[9]) ? 'disabled' : '' }}>Туркменистан s9.tmsat.live</option>
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
                        // res.text().then(data => console.log(data))
                        return res.json();
                    }).then(data => {
                        // console.log(data);
                        if (data.status == true) {
                            window.location.reload();
                            // console.log(data);
                        } else if (data.status == false) {
                            alert(data.message);
                        }
                    })
                }
            } else if (e.target.classList.contains('btn_stop_paket')) {
                const body = {};
                body.client_id = e.target.closest('.item_user').dataset.client_id;
                fetch('/diller/stop_client', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(body)
                }).then(res => {
                    // res.text().then(data => console.log(data));
                    return res.json();
                }).then(data => {
                    if (data.status == true) {
                        window.location.reload();
                        // console.log(data);
                    } else if (data.status == false) {
                        alert(data.message);
                    } else {
                        // console.log(data);
                    }
                })
                // console.log(body);
            }
        })
        const checkBoxForAllUser = document.getElementById('checkBoxForAllUser');
        const blockAllUser = checkBoxForAllUser.closest('.all_user');
        const setServerAllUser = document.getElementById('setServerAllUser');
        const mainAlluser = document.querySelector('.main_all_user');
        const buyPaketForAllUser = document.getElementById('buyPaketForAllUser');
        const selectPaketForAllUser = document.querySelector('.selectPaketForAllUser');
        checkBoxForAllUser.addEventListener('change', function(e) {
            blockAllUser.querySelectorAll('.item_user').forEach(function(element, index) {
                element.querySelector('input.check_it').click();
            })
        });
        setServerAllUser.addEventListener('click', function(e) {
            const allClients = {
                clients: []
            };
            blockAllUser.querySelectorAll('.item_user').forEach(function(element, index) {
                if (element.querySelector('input.check_it').checked) {
                    allClients.clients.push(element.closest('.item_user').dataset.client_id);
                }
            })
            allClients.server = document.querySelector('.selectForAllClients').value;
            if (allClients.clients.length > 0) {
                fetch('/diller/set-server-all-client', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(allClients)
                }).then(res => {
                    // res.text().then(data => console.log(data));
                    return res.json();
                }).then(data => {
                    if (data.status == true) {
                        window.location.reload();
                        // console.log(data);
                    } else if (data.status == false) {
                        alert(data.message);
                    } else {
                        // console.log(data);
                        window.location.reload();
                    }
                })
            }
            // console.log(allClients);
        })
        buyPaketForAllUser.addEventListener('click', function(e) {
            const allClients = {
                clients: []
            };
            blockAllUser.querySelectorAll('.item_user').forEach(function(element, index) {
                if (element.querySelector('input.check_it').checked) {
                    allClients.clients.push(element.closest('.item_user').dataset.client_id);
                }
            })
            allClients.paket = selectPaketForAllUser.value;
            if (allClients.clients.length > 0) {
                fetch('/diller/buy-paket-all-client', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(allClients)
                }).then(res => {
                    // res.text().then(data => console.log(data));
                    return res.json();
                }).then(data => {
                    if (data.status == true) {
                        window.location.reload();
                        // console.log(data);
                    } else if (data.status == false) {
                        alert(data.message);
                    } else {
                        // console.log(data);
                        window.location.reload();
                    }
                })
            }
            // console.log(allClients);
        })
        const prevPage = document.querySelector('.paginate #prevPage');
        const nextPage = document.querySelector('.paginate #nextPage');
        if (prevPage) {
            prevPage.addEventListener('click', function(e) {
                window.location.href = e.target.dataset.url;
            })
        }
        if (nextPage) {
            nextPage.addEventListener('click', function(e) {
                window.location.href = e.target.dataset.url;
            })
        }
    </script>
</body>

</html>
