@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-3">
            <h1>Новоcти</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class=" col-sm-12 col-md-12">
            @if ($errors->any())
                <div class="mb-2">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger m-0 p-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ $post ? route('admin.news.update') : route('admin.news.store') }}">
                @if ($post)
                    @method('PUT')
                @endif
                @csrf
                <input type="hidden" name="post_id" value="{{ $post ? $post->id : '' }}">
                <div class="form-group">
                    <label>title</label>
                    <div id="summernote-header-news">{!! $post ? $post->title : '' !!}</div>
                    <input class="summernote-header-news" type="hidden" name="title">
                </div>
                <div class="form-group">
                    <label>content</label>
                    <div id="summernote-content-news">{!! $post ? $post->content : '' !!}</div>
                    <input class="summernote-content-news" type="hidden" name="content">
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success btn_for_add_or_update" value="{{ $post ? 'Изменить' : 'Добавить' }}">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            @if (isset($posts) && count($posts) > 0)
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
                                @foreach ($posts as $post)
                                    <tr>
                                        <td style="width:200px">{{ $post->id }}</td>
                                        <td style="width:600px">{!! $post->title !!}</td>
                                        <td style="text-align:center;"><a href="/admin/news?post={{ $post->id }}"><i class="ml-4 mr-4 fas fa-pen"></i></a><i class="ml-4 mr-4 fa fa-trash text-danger btn_for_delete_news" data-post_id="{{ $post->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $posts->links() }}
            @endif
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
@endsection
