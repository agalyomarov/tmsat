<header>
    <div class="top_head">
        <div class="container clearfix">
            <button class="open_mob_menu"><span></span></button>
            <a href="{{ route('main') }}" class="logo">TM<span>SAT</span></a>
            <div class="row">
                <div class="wrapp_menu">
                    <!---------------------------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------------------------->
                    <ul class="list_navi">
                        <li>
                            <a href="{{ route('main') }}" class="link @if (Route::is('main')) active @endif">Главная</a>
                        </li>
                        @guest
                            <li>
                                <a href="{{ route('login.index') }}" class="link @if (Route::is('login.index')) active @endif">Войти</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{ route('news') }}" class="link @if (Route::is('news')) active @endif">Новости</a>
                            </li>
                            <li>
                                <a href="{{ route('profile') }}" class="link @if (Route::is('profile')) active @endif">Профиль</a>
                            </li>
                            <li>
                                <a href=" {{ route('pay_balance') }}" class="link @if (Route::is('pay_balance')) active @endif">Пополнить баланс</a>
                            </li>
                            <li>
                                <a href="{{ route('diller.index') }}" class="link @if (Route::is('diller.index')) active @endif">Диллерам</a>
                            </li>
                            {{-- <li>
                                <a href="{{ asset('paket') }}" class="link @if (Route::is('paket')) active @endif">Наши пакеты</a>
                            </li> --}}
                            <li>
                                <a href="{{ asset('select_server') }}" class="link @if (Route::is('select_server')) active @endif">Выбрать сервер</a>
                            </li>
                            <li>
                                <a href="{{ asset('tools') }}" class="link @if (Route::is('tools')) active @endif">Настройки пакетов</a>
                            </li>
                            <li>
                                <a href="{{ asset('regulation') }}" class="link @if (Route::is('regulation')) active @endif">Правила пользования</a>
                            </li>
                            <li>
                                <a href="{{ route('login.logout') }}" class="link">Выйти</a>
                            </li>
                        @endauth
                    </ul>
                    <!---------------------------------------------------------------------------------------------------->
                    <!---------------------------------------------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</header>
