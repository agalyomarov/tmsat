
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-3">
            <h1>Диллеры</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12 col-md-6">
            <form method="search">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="login_search" value="<?php echo e($login_search); ?>">
                        <div class="input-group-append">
                            <input type="submit" class="input-group-text" value="поиск">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class=" col-sm-12 col-md-6">
            <?php if($errors->any()): ?>
                <div class="mb-2">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="text-danger m-0 p-0"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?php echo e($diller ? route('admin.diller.update') : route('admin.diller.store')); ?>">
                <?php if($diller): ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="diller_id" value="<?php echo e($diller->id); ?>">
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>login</label>
                    <input type="text" class="form-control" name="login" value="<?php echo e(old('login', $diller ? $diller->login : '')); ?>">
                </div>
                <div class="form-group">
                    <label>parol</label>
                    <input type="text" class="form-control" name="parol" value="<?php echo e(old('parol', $diller ? $diller->parol : '')); ?>">
                </div>
                <div class="form-group">
                    <label>balance</label>
                    <input type="text" class="form-control" name="balance" value="<?php echo e(old('balance', $diller ? $diller->balance : '')); ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="<?php echo e($diller ? 'Изменить' : 'Добавить диллер'); ?>">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            <?php if(isset($dillers) && count($dillers) > 0): ?>
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table_dillers">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>login</th>
                                    <th>parol</th>
                                    <th>balance</th>
                                    <th colspan="2">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $dillers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($diller->id); ?></td>
                                        <td><?php echo e($diller->login); ?></td>
                                        <td><?php echo e($diller->parol); ?></td>
                                        <td><?php echo e($diller->balance); ?></td>
                                        <td><a href="/admin?diller=<?php echo e($diller->id); ?>"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="fa fa-trash text-danger btn_for_delete_diller" data-diller_id="<?php echo e($diller->id); ?>"></i></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo e($dillers->withQueryString()->links()); ?>

            <?php endif; ?>
        </div>
    </div>
    <script>
        if (document.querySelector('.table_dillers')) {
            document.querySelector('.table_dillers').addEventListener('click', function(e) {
                if (e.target.classList.contains('btn_for_delete_diller')) {
                    const check = confirm('Вы точно хотите удалить диллер?');
                    if (check) {
                        window.location = `/admin/diller/delete/${e.target.dataset.diller_id}`;
                    }
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/admin/diller.blade.php ENDPATH**/ ?>