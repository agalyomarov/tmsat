@extends('layouts.admin')
@section('content')
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
                        <input type="text" class="form-control" name="login_search" value="{{ $login_search }}">
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
            @if ($errors->any())
                <div class="mb-2">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger m-0 p-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ $diller ? route('admin.diller.update') : route('admin.diller.store') }}">
                @if ($diller)
                    @method('PUT')
                    <input type="hidden" name="diller_id" value="{{ $diller->id }}">
                @endif
                @csrf
                <div class="form-group">
                    <label>login</label>
                    <input type="text" class="form-control" name="login" value="{{ old('login', $diller ? $diller->login : '') }}">
                </div>
                <div class="form-group">
                    <label>parol</label>
                    <input type="text" class="form-control" name="parol" value="{{ old('parol', $diller ? $diller->parol : '') }}">
                </div>
                <div class="form-group">
                    <label>balance</label>
                    <input type="text" class="form-control" name="balance" value="{{ old('balance', $diller ? $diller->balance : '') }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="{{ $diller ? 'Изменть' : 'Добавить диллер' }}">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 mt-2">
            @if (isset($dillers) && count($dillers) > 0)
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
                                @foreach ($dillers as $diller)
                                    <tr>
                                        <td>{{ $diller->id }}</td>
                                        <td>{{ $diller->login }}</td>
                                        <td>{{ $diller->parol }}</td>
                                        <td>{{ $diller->balance }}</td>
                                        <td><a href="/admin?diller={{ $diller->id }}"><i class="fas fa-pen"></i></a></td>
                                        <td><i class="fa fa-trash text-danger btn_for_delete_diller" data-diller_id="{{ $diller->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $dillers->withQueryString()->links() }}
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
    </script>
@endsection
