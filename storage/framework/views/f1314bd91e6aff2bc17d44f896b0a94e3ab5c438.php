<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <title></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/framework.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style.css?3')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js.js?4')); ?>"></script>
</head>

<body>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="home">
        <div class="container clearfix">
            <?php echo $__env->make('includes.form_profile_mob', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main_regulation">
                <div class="item">
                    <p class="name_name">1.1 Как создать учетку и получить данные для подключения</p>
                    <p class="num">1.Переходим на вкладку "пополнить баланс", и пополняем удобным для вас способом</p>
                    <div class="logo_instruction">
                        <img src="img/1_1.png" />
                    </div>
                </div>
                <div class="item">
                    <p class="num">2. Переходим на вкладку "диллерам", ищем свой логин, учетка добавлена!</p>
                    <div class="logo_instruction">
                        <img src="img/2_2.png" />
                    </div>
                </div>
                <div class="item">
                    <p class="num">3. Затем переходим на вкладку "пакеты", выбираем нам нужный!</p>
                    <div class="logo_instruction">
                        <img src="img/3_3.png" />
                    </div>
                </div>
                <div class="item">
                    <p class="num">4. Далее переходим на вкладку "порты", и запоминаем нам нужный! Данный порт будем прописывать в настройки приставки для подключения</p>
                    <div class="logo_instruction">
                        <img src="img/4_4.png" />
                    </div>
                </div>
                <div class="item">
                    <p class="name_name">2.1 Как пополнить свой баланс</p>
                    <p class="num">Переходим на вкладку "пополнить баланс", и пополняем удобным для вас способом</p>
                    <div class="logo_instruction">
                        <img src="img/1_1.png" />
                    </div>
                </div>
                <div class="item">
                    <p class="name_name">3.1 Как сменить сервер для выбранной учетки</p>
                    <p class="num">Выбираем из текущих серверов нужный</p>
                    <div class="logo_instruction">
                        <img src="img/3_3.png" />
                    </div>
                </div>
                <div class="item">
                    <p class="name_name">4.1 Как сменить пароль созданной учетки</p>
                    <p class="num">Переходим во вкладку профиль, и меняем текущий пароль</p>
                    <div class="logo_instruction">
                        <img src="img/5_5.png" />
                    </div>
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
</body>

</html>
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/regulation.blade.php ENDPATH**/ ?>