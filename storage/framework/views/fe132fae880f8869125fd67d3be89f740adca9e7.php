<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('./slick/slick.css')); ?>">
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('./slick/slick-theme.css')); ?>">
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/framework.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style.css?1')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js.js?2')); ?>"></script>
</head>

<body>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="home">
        <div class="container clearfix">
            <?php echo $__env->make('includes.form_profile_mob', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="workload_main">
                <div class="item_workload">
                    <p class="name_work left">Сервер</p>
                    <p class="sum_work right">Загрузка</p>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[1]) ? $data[1] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[1]) ? $data[1] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[2]) ? $data[2] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[2]) ? $data[2] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[3]) ? $data[3] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[3]) ? $data[3] : 0); ?>%"></div>
                    </div>
                </div>


                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[4]) ? $data[4] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[4]) ? $data[4] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[5]) ? $data[5] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[5]) ? $data[5] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[6]) ? $data[6] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[6]) ? $data[6] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[7]) ? $data[7] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[7]) ? $data[7] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[8]) ? $data[8] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[8]) ? $data[8] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="item_workload">
                    <p class="name_work">Таджикистан s2.tmsat.live</p>
                    <p class="sum_work"><?php echo e(isset($data[9]) ? $data[9] : 0); ?>%</p>
                    <div class="line_all">
                        <div class="line_workload second" style="width:<?php echo e(isset($data[9]) ? $data[9] : 0); ?>%"></div>
                    </div>
                </div>

                <div class="info_server_main">
                    <p class="info_server all"><?php echo e($aktiveClients); ?></p>
                    
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
    <script src="<?php echo e(asset('slick/slick.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
</body>

</html>
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/select_server.blade.php ENDPATH**/ ?>