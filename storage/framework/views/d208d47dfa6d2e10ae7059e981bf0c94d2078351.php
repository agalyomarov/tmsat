<?php if(auth()->guard()->check()): ?>
    <div class="form_profile mob" data-diller_balance="<?php echo e(auth()->user()->balance); ?>">
        <p class="name_profile"><?php echo e(auth()->user()->login); ?></p>
        <p class="balance_profile">Ваш баланс<span class="sum"><?php echo e(auth()->user()->balance); ?></span></p>
    </div>
<?php endif; ?>
<?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/includes/form_profile_mob.blade.php ENDPATH**/ ?>