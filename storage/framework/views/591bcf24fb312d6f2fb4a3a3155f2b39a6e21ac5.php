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
            <div class="main_pay">
                <div class="all_pay_table">
                    <div class="top_pay_table">
                        <div class="item name_pay">
                            <p class="name_name">Название пакета</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_name">Цена в месяц</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">НТВ Плюс Восток 56Е</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.00</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">Телекарта 85Е</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.00</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">Canal + Sport 13E</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$0.50</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">NC + Cyfra 13E</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$0.50</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">Polsat 13E</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$0.50</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">VIP Все пакеты (Без D-smart)</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.50</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">Телекарта 85E + НТВ Плюс 56Е</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.30</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">Телекарта 85E + 13E пакеты</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.30</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">Сетанта Спорт 31.5Е</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.00</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">D-smart 42E</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.00</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">GeoTelecom 75E</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.00</p>
                        </div>
                    </div>
                    <div class="content_pay_table">
                        <div class="item name_pay">
                            <p class="name_info">НТВ Плюс 36E</p>
                        </div>
                        <div class="item price_pay">
                            <p class="name_info">$1.00</p>
                        </div>
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
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/paket.blade.php ENDPATH**/ ?>