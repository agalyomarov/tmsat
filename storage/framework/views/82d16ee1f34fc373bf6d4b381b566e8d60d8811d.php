<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-3">
            <h1>Новоcти</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class=" col-sm-12 col-md-12">
            <?php if($errors->any()): ?>
                <div class="mb-2">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="text-danger m-0 p-0"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?php echo e($post ? route('admin.news.update') : route('admin.news.store')); ?>">
                <?php if($post): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="post_id" value="<?php echo e($post ? $post->id : ''); ?>">
                <div class="form-group">
                    <label>title</label>
                    <div id="summernote-header-news"><?php echo $post ? $post->title : ''; ?></div>
                    <input class="summernote-header-news" type="hidden" name="title">
                </div>
                <div class="form-group">
                    <label>content</label>
                    <div id="summernote-content-news"><?php echo $post ? $post->content : ''; ?></div>
                    <input class="summernote-content-news" type="hidden" name="content">
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success btn_for_add_or_update" value="<?php echo e($post ? 'Изменить' : 'Добавить'); ?>">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            <?php if(isset($posts) && count($posts) > 0): ?>
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table_dillers">
                            <thead>
                                <tr>
                                    <th style="width:200px">ID</th>
                                    <th style="width:600px;text-align:center">title</th>
                                    <th style="text-align:center">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width:200px"><?php echo e($post->id); ?></td>
                                        <td style="width:600px"><?php echo $post->title; ?></td>
                                        <td style="text-align:center;"><a href="/admin/news?post=<?php echo e($post->id); ?>"><i class="ml-4 mr-4 fas fa-pen"></i></a><i class="ml-4 mr-4 fa fa-trash text-danger btn_for_delete_news" data-post_id="<?php echo e($post->id); ?>"></i></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo e($posts->links()); ?>

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
        $('#summernote-header-news').summernote({
            lang: 'ru-RU',
            height: 100, // set editor height
            minHeight: 100,
            maxHeight: null,
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('#summernote-content-news').summernote({
            lang: 'ru-RU',
            height: 300, // set editor height
            minHeight: 300,
            maxHeight: null,
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        document.querySelector('.btn_for_add_or_update').addEventListener('click', function(e) {
            document.querySelector('input.summernote-header-news').value = $('#summernote-header-news').summernote('code');
            document.querySelector('input.summernote-content-news').value = $('#summernote-content-news').summernote('code');
            e.target.closest('form').submit();
        })
        if (document.querySelector('.table_dillers')) {
            document.querySelector('.table_dillers').addEventListener('click', function(e) {
                if (e.target.classList.contains('btn_for_delete_news')) {
                    const check = confirm('Вы точно хотите удалить диллер?');
                    if (check) {
                        window.location = `/admin/news/delete/${e.target.dataset.post_id}`;
                    }
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/agaly/Desktop/tmsat/resources/views/admin/news.blade.php ENDPATH**/ ?>