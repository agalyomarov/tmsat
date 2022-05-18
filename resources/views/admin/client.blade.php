@extends('layouts.admin')
@section('content')
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
                        <input type="text" class="form-control" name="login_search" value="{{ $login_search }}">
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
            @if (isset($clients) && count($clients) > 0)
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
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->login }}</td>
                                        <td>{{ $client->parol }}</td>
                                        <td>{{ $client->diller->login }}</td>
                                        <td>{{ $client->server }}</td>
                                        <td>{{ $client->end_date !== null ? Date::parse($client->end_date)->format('d.m.Y') : 'нет' }}</td>
                                        <td><i class="fa fa-trash text-danger btn_for_delete_client" data-client_id="{{ $client->id }}"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $clients->withQueryString()->links() }}
            @endif
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
@endsection
