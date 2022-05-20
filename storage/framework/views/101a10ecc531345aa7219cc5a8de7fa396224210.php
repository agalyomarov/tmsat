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
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/js.js?4')); ?>"></script>
    <style>
        .alert-danger {
            position: relative;
            text-align: center;
            margin-bottom: 10px;

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
            <?php echo $__env->make('includes.form_profile_mob', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <h1 class="our_clients">Настройка Профиля</h1>
            <div class="main_profile">
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
                <div class="profile_edit_tools">
                    <p class="title">Редактирование данных</p>
                    <form action="<?php echo e(route('login.update')); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <label>
                            <span class="name_profile_edit">Пароль</span>
                            <input type="text" placeholder="Измените пароль" name="parol" />
                        </label>
                        <input type="submit" class="btn" value="Изменить">
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
</body>

</html>
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/profile.blade.php ENDPATH**/ ?>