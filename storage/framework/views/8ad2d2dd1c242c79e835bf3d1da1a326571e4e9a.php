<header>
    <div class="top_head">
        <div class="container clearfix">
            <button class="open_mob_menu"><span></span></button>
            <a href="<?php echo e(route('main')); ?>" class="logo">TM<span>SAT</span></a>
            <div class="row">
                <div class="wrapp_menu">
                    <!---------------------------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------------------------->
                    <ul class="list_navi">
                        <li>
                            <a href="<?php echo e(route('main')); ?>" class="link <?php if(Route::is('main')): ?> active <?php endif; ?>">Главная</a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <li>
                                <a href="<?php echo e(route('login.index')); ?>" class="link <?php if(Route::is('login.index')): ?> active <?php endif; ?>">Войти</a>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li>
                                <a href="<?php echo e(route('news')); ?>" class="link <?php if(Route::is('news')): ?> active <?php endif; ?>">Новости</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('profile')); ?>" class="link <?php if(Route::is('profile')): ?> active <?php endif; ?>">Профиль</a>
                            </li>
                            <li>
                                <a href=" <?php echo e(route('pay_balance')); ?>" class="link <?php if(Route::is('pay_balance')): ?> active <?php endif; ?>">Пополнить баланс</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('diller.index')); ?>" class="link <?php if(Route::is('diller.index')): ?> active <?php endif; ?>">Диллерам</a>
                            </li>
                            
                            <li>
                                <a href="<?php echo e(asset('select_server')); ?>" class="link <?php if(Route::is('select_server')): ?> active <?php endif; ?>">Выбрать сервер</a>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('tools')); ?>" class="link <?php if(Route::is('tools')): ?> active <?php endif; ?>">Настройки пакетов</a>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('regulation')); ?>" class="link <?php if(Route::is('regulation')): ?> active <?php endif; ?>">Правила пользования</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('login.logout')); ?>" class="link">Выйти</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!---------------------------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
    
</header>
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/includes/header.blade.php ENDPATH**/ ?>