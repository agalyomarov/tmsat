<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css?3') }}">
    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js?4') }}"></script>
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
    @include('includes.header')
    <section class="home">
        <div class="container clearfix">
            @include('includes.form_profile_mob')

            <h1 class="our_clients">Настройка Профиля</h1>
            <div class="main_profile">
                @if ($errors->any())
                    <div class="alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if (isset($message))
                    <div class="alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="profile_edit_tools">
                    <p class="title">Редактирование данных</p>
                    <form action="{{ route('login.update') }}" method="post">
                        @method('PUT')
                        @csrf
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
