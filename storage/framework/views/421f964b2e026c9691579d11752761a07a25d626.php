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
        }

        .alert-danger p {
            color: #fff;
            margin-bottom: 2px;
            text-align: center;
        }

    </style>
</head>

<body>
    <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="home">
        <div class="container clearfix">
            <div class="form_enter">
                <?php if($errors->any()): ?>
                    <div class="alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
                <div class="tab_enter">
                    <span class="enter">Вход</span>
                    <span class="reg">Регистрация</span>
                    <form class="enter_enter" action="<?php echo e(route('login.login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="text" placeholder="Логин" name="login" />
                        <input type="text" placeholder="Пароль" name="parol" />
                        <input type="submit" class="btn" value="Войти">
                    </form>
                    <form class="reg_reg" action="<?php echo e(route('login.register')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="text" placeholder="Логин*" name="login" value="<?php echo e(old('login')); ?>">
                        <input type=" text" placeholder="Пароль*" name="parol" value="<?php echo e(old('password')); ?>">
                        <input type="submit" class="btn" value="Зарегестрироваться">
                    </form>
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
    <script>
        const hash = location.hash.substr(1);
        if (hash) {
            if (hash == 'login') {
                document.querySelector('.tab_enter span.enter').classList.add('active');
                document.querySelector('.tab_enter span.reg').classList.remove('active');
                document.querySelector('.tab_enter form.enter_enter').classList.remove('hide');
                document.querySelector('.tab_enter form.reg_reg').classList.add('hide');
            } else if (hash == 'register') {
                document.querySelector('.tab_enter span.enter').classList.remove('active');
                document.querySelector('.tab_enter span.reg').classList.add('active');
                document.querySelector('.tab_enter form.enter_enter').classList.add('hide');
                document.querySelector('.tab_enter form.reg_reg').classList.remove('hide');
            }
        } else {
            document.querySelector('.tab_enter span.enter').classList.add('active');
            document.querySelector('.tab_enter span.reg').classList.remove('active');
            document.querySelector('.tab_enter form.enter_enter').classList.remove('hide');
            document.querySelector('.tab_enter form.reg_reg').classList.add('hide');
        }
    </script>
</body>

</html>
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/login.blade.php ENDPATH**/ ?>