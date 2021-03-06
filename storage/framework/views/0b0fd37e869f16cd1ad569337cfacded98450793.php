<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/framework.css')); ?>">
    <link rel="stylesheet" href="style.css?3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/aa53675e71.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js.js?4')); ?>"></script>
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
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="home">
        <div class="container clearfix">
            <?php echo $__env->make('includes.form_profile_mob', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <h1 class="our_clients">???????? ??????????????</h1>
            <?php echo $__env->make('includes.form_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form class="search_user">
                <a href="create_cliente.html" class="add_btn">???????????????? ??????????????</a>
                <input type="text" placeholder="?????????????? ?????? ????????????????????????" id="inputForSearchClients" name="search" value="<?php echo e($search); ?>">
                <button class=" search" id="btnForSearchClients">??????????</button>
            </form>
            <div class="main_all_user">
                <div class="active_user"><?php echo e($activeClient); ?> (<?php echo e($countAllClients); ?>)</div>
                <div class="num_single">
                    <select class="count_clients">
                        <option value="10" <?php echo e($count == 10 ? 'selected' : ''); ?>>10</option>
                        <option value="100" <?php echo e($count == 100 ? 'selected' : ''); ?>>100</option>
                        <option value="1000" <?php echo e($count == 1000 ? 'selected' : ''); ?>>1000</option>
                    </select>
                </div>
                <div class="all_user">
                    <div class="top_cap">
                        <div class="item check_item">
                            <input type="checkbox" class="check_it " id="checkBoxForAllUser">
                        </div>
                        <div class="item login_item">
                            <p class="name_name">??????????</p>
                        </div>
                        <div class="item pass_item">
                            <p class="name_name">????????????</p>
                        </div>
                        <div class="item server_item">
                            <p class="name_name">????????????</p>
                        </div>
                        <div class="item notific_item">
                            <p class="name_name">??????????????</p>
                        </div>
                        <div class="item day_item">
                            <p class="name_name">??????????????????</p>
                        </div>
                        <div class="item btn_item">
                            <p class="name_name">????????????????</p>
                        </div>
                    </div>
                    <?php if(isset($clients) && count($clients) > 0): ?>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item_user <?php if($client->end_date && strtotime($client->end_date) > strtotime(Date::now()) + 259200): ?> active <?php endif; ?> <?php if($client->end_date && strtotime($client->end_date) <= strtotime(Date::now()) + 259200): ?> ended <?php endif; ?>" data-client_id=<?php echo e($client->id); ?> data-login=<?php echo e($client->login); ?> data-parol=<?php echo e($client->parol); ?> data-server=<?php echo e($client->server); ?>

                                data-description=<?php echo e($client->description); ?>>
                                <div class="item check_item">
                                    <input type="checkbox" class="check_it" />
                                </div>
                                <div class="item login_item">
                                    <p class="name_info"><?php echo e($client->login); ?></p>
                                </div>
                                <div class="item pass_item">
                                    <p class="name_info"><?php echo e($client->parol); ?></p>
                                </div>
                                <div class="item server_item">
                                    <p class="name_info"><?php echo e($client->server); ?></p>
                                </div>
                                <div class="item notific_item">
                                    <p class="name_info"><?php echo e($client->description); ?></p>
                                </div>
                                <div class="item day_item">
                                    <p class="name_info"><?php echo e($client->end_date ? Date::parse($client->end_date)->format('d.m.Y') : ''); ?></p>
                                </div>
                                <div class="item btn_item">
                                    <div class="list_btn">????????????????</div>
                                    <div class="all_action">
                                        <p class="change_client_data">????????????????</p>
                                        <p class="delete_client">??????????????</p>
                                        <a href="<?php echo e(route('diller.buyPaket', $client->id)); ?>">????????????</a>
                                        <p class="btn_stop_paket">??????????????????</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="notted_single">
                    <select class="selectForAllClients">
                        <option value="1" <?php echo e(isset($data[1]) ? 'disabled' : ''); ?>>#1????????????</option>
                        <option value="2" <?php echo e(isset($data[2]) ? 'disabled' : ''); ?>>#2????????????</option>
                        <option value="3" <?php echo e(isset($data[3]) ? 'disabled' : ''); ?>>#3????????????</option>
                        <option value="4" <?php echo e(isset($data[4]) ? 'disabled' : ''); ?>>#4????????????</option>
                        <option value="5" <?php echo e(isset($data[5]) ? 'disabled' : ''); ?>>#5????????????</option>
                        <option value="6" <?php echo e(isset($data[6]) ? 'disabled' : ''); ?>>#6????????????</option>
                        <option value="7" <?php echo e(isset($data[7]) ? 'disabled' : ''); ?>>#7C??????????</option>
                        <option value="8" <?php echo e(isset($data[8]) ? 'disabled' : ''); ?>>#8????????????</option>
                        <option value="9" <?php echo e(isset($data[9]) ? 'disabled' : ''); ?>>#9????????????</option>
                    </select>
                    <span class="install" id="setServerAllUser">??????????????????</span>
                </div>
                <div class="notted_single" style="overflow:hidden;padding-right: 3px">
                    <select class="selectPaketForAllUser">
                        <option value="1">???????????????? ???? 1 ??????????</option>
                        <option value="2">???????????????? ???? 2 ????????????</option>
                        <option value="3">???????????????? ???? 3 ????????????</option>
                        <option value="4">???????????????? ???? 4 ????????????</option>
                        <option value="5">???????????????? ???? 5 ??????????????</option>
                        <option value="6">???????????????? ???? 6 ??????????????</option>
                        <option value="12">???????????????? ???? 1 ??????</option>
                    </select>
                    <span class="install" id="buyPaketForAllUser">??????????????????</span>
                    <?php if($count == 1000): ?>
                        <div class="paginate">
                            <i data-url="<?php echo e($clients->previousPageUrl() ?? 'diller?page='); ?>&search=<?php echo e($search); ?>&count=<?php echo e($count); ?>" id="prevPage" class="fa-solid fa-angle-left"></i>
                            <span><?php echo e($clients->currentPage()); ?></span>
                            <i data-url="<?php echo e($clients->nextPageUrl() ?? 'diller?page='); ?>&search=<?php echo e($search); ?>&count=<?php echo e($count); ?>" id="nextPage" class="fa-solid fa-angle-right"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <div class="profile_edit">

        <span class="cansel"></span>
        <p class="title">?????????????? ????????????</p>

        <form action="#" method="post" class="form_add_client">
            <?php echo csrf_field(); ?>
            <label>
                <span class="name_profile_edit">??????????</span>
                <input type="text" placeholder="?????????????? ??????????" name="login" />
            </label>
            <label>
                <span class=" name_profile_edit">????????????</span>
                <input type="text" placeholder="?????????????? ????????????" name="parol" />
            </label>
            <label>
                <span class=" name_profile_edit">????????????</span>
                <select name="server">
                    <option value=""></option>
                    <option value="1" <?php echo e(isset($data[1]) ? 'disabled' : ''); ?>>???????????????????????? s1.tmsat.live</option>
                    <option value="2" <?php echo e(isset($data[2]) ? 'disabled' : ''); ?>>???????????????????????? s2.tmsat.live</option>
                    <option value="3" <?php echo e(isset($data[3]) ? 'disabled' : ''); ?>>???????????????????????? s3.tmsat.live</option>
                    <option value="4" <?php echo e(isset($data[4]) ? 'disabled' : ''); ?>>???????????????????????? s4.tmsat.live</option>
                    <option value="5" <?php echo e(isset($data[5]) ? 'disabled' : ''); ?>>???????????????????????? s5.tmsat.live</option>
                    <option value="6" <?php echo e(isset($data[6]) ? 'disabled' : ''); ?>>???????????????????????? s6.tmsat.live</option>
                    <option value="7" <?php echo e(isset($data[7]) ? 'disabled' : ''); ?>>???????????????????????? s7.tmsat.live</option>
                    <option value="8" <?php echo e(isset($data[8]) ? 'disabled' : ''); ?>>???????????????????????? s8.tmsat.live</option>
                    <option value="9" <?php echo e(isset($data[9]) ? 'disabled' : ''); ?>>???????????????????????? s9.tmsat.live</option>
                </select>
            </label>
            <label>
                <span class="name_profile_edit">??????????????</span>
                <input type="text" name="description">
            </label>
            <input type="button" class="btn add_client" value="??????????????" style="padding: 5px 5px;font-size:14px">
        </form>
    </div>
    <div class="black_fon"></div>
    <footer>
        <div class="container clearfix">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!----- ?????????????? ?????????????? ----->
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
            formAddClient.insertAdjacentHTML('beforeend', '<input type="button" class="btn add_client" value="??????????????" style="padding: 5px 5px;font-size:14px">');
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
                formAddClient.insertAdjacentHTML('beforeend', '<input type="button" class="btn add_client" value="??????????????" style="padding: 5px 5px;font-size:14px">');
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
                const check = confirm('???? ?????????? ???????????? ?????????????? ???????????????');
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
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/diller.blade.php ENDPATH**/ ?>