
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-3">
            <h1>Клиенты</h1>
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
    <div class="row mt-2">
        <div class="col-12 mt-2">
            <?php if(isset($clients) && count($clients) > 0): ?>
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table_dillers">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>login</th>
                                    <th>parol</th>
                                    <th>diller</th>
                                    <th>server</th>
                                    <th>Окончание пакета</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($client->id); ?></td>
                                        <td><?php echo e($client->login); ?></td>
                                        <td><?php echo e($client->parol); ?></td>
                                        <td><?php echo e($client->diller->login); ?></td>
                                        <td><?php echo e($client->server); ?></td>
                                        <td><?php echo e($client->end_date !== null ? Date::parse($client->end_date)->format('d.m.Y') : 'нет'); ?></td>
                                        <td><i class="fa fa-trash text-danger btn_for_delete_client" data-client_id="<?php echo e($client->id); ?>"></i></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo e($clients->withQueryString()->links()); ?>

            <?php endif; ?>
        </div>
    </div>
    <script>
        if (document.querySelector('.table_dillers')) {
            document.querySelector('.table_dillers').addEventListener('click', function(e) {
                if (e.target.classList.contains('btn_for_delete_client')) {
                    const check = confirm('Вы точно хотите удалить клиента?');
                    if (check) {
                        window.location = `/admin/client/delete/${e.target.dataset.client_id}`;
                    }
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/admin/client.blade.php ENDPATH**/ ?>