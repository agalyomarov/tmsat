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
    <style>
        .alert-danger {
            position: relative;
            text-align: center;
            margin-bottom: 20px;

        }

        .alert-danger p {
            color: #fff;
            margin-bottom: 4px;
            text-align: center;
        }

    </style>
</head>

<body>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="home">
        <div class="container clearfix">
            <?php echo $__env->make('includes.form_profile_mob', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <h1 class="our_clients">Пополнить баланс</h1>
            <div class="main_pay_balance">
                <div class="tab_pay">
                    <?php if($errors->any()): ?>
                        <div class="alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($message)): ?>
                        <div class="alert-danger">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>
                    <p class="pay_pay active">Пополнение</p>
                    <p class="transfer_pay">Передача средств</p>
                    <p class="history_pay">История пополнения</p>
                    <div class="pay_pay_item">
                        <p class="text">Это страница вашего баланса, здесь Вы можете его пополнить. Средства на баланс зачисляются в течении 20 минут!</p>
                        <div class="wallet">
                            <p class="title">WEBMONEY:</p>
                            <p class="code">z449516764716</p>
                            <p class="info">
                                Внимание! Минимальное пополнение 5 wmz.
                            </p>
                            <ul>
                                <li>
                                    <span>1. Примечание к платежу:</span>
                                    <input type="text" placeholder="<?php echo e(auth()->user()->login); ?>" />
                                </li>
                                <li>
                                    <span>2. Отправьте средства на:</span>
                                    <input disabled type="text" placeholder="z449516764716" />
                                </li>
                                <li>
                                    <span>3. Напишите администратору о вашем платеже</span>
                                </li>
                            </ul>
                        </div>
                        <div class="wallet">
                            <p class="title">Яндекс</p>
                            <p class="code">3454354355234</p>
                            <ul>
                                <li>
                                    <span>1. Примечание к платежу:</span>
                                    <input type="text" placeholder="<?php echo e(auth()->user()->login); ?>" />
                                </li>
                                <li>
                                    <span>2. Отправьте средства на:</span>
                                    <input disabled type="text" placeholder="3454354355234" />
                                </li>
                                <li>
                                    <span>3. Напишите администратору о вашем платеже</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="transfer_pay_item hide">
                        <form action="<?php echo e(route('pay_balance.send')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <label>
                                <span class="name_name">Отправить $</span>
                                <input type="text" placeholder="Введите сумму" name="balance" value="<?php echo e(old('balance')); ?>">
                            </label>
                            <label>
                                <span class="name_name">Получатель</span>
                                <input type="text" placeholder="login получателя" name="login" value="<?php echo e(old('login')); ?>">
                            </label>
                            <input type="submit" value="Отправить" class="btn">
                        </form>
                    </div>
                    <div class="history_pay_item hide">
                        <div class="top_it">
                            <div class="item date">
                                <p class="name_name">Дата</p>
                            </div>
                            <div class="item motion">
                                <p class="name_name">+/-</p>
                            </div>
                            <div class="item price">
                                <p class="name_name">Сумма</p>
                            </div>
                            <div class="item operation">
                                <p class="name_name">Операция</p>
                            </div>
                        </div>
                        <?php if(isset($balance_histories)): ?>
                            <?php $__currentLoopData = $balance_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item_history">
                                    <div class="item date">
                                        <p class="name_info"><?php echo e(date('d.m.Y', strtotime($history->date))); ?> </p>
                                    </div>
                                    <div class="item motion">
                                        <p class="name_info"><?php echo e($history->action); ?></p>
                                    </div>
                                    <div class="item price">
                                        <p class="name_info"><?php echo e($history->summa); ?>$</p>
                                    </div>
                                    <div class="item operation">
                                        <p class="name_info"><?php echo e($history->operation); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/pay_balance.blade.php ENDPATH**/ ?>