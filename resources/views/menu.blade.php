<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <image class="me-2" src="{{asset('../assets/img/baby.svg')}}" alt="Baby picture" width="40" height="40">
        <a class="navbar-brand" href="{{route('site.index')}}">Режим ребенка</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('site.index')?'active':'' }}" aria-current="page" href="{{route('site.index')}}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Отчет
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ request()->routeIs('report.index')?'active':'' }}" href="{{route('report.index')}}">Общий</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('sleep-report')?'active':'' }}" href="{{route('sleep-report')}}">Сон</a></li>
                        <li><a class="dropdown-item" href="#">Кормление</a></li>
                        <li><a class="dropdown-item" href="#">Прогулка</a></li>
                    </ul>
                </li>
            </ul>
            @endauth
            <ul class="navbar-nav mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-secondary btn-sm" type="submit">{{Auth::user()->name}} (Выход)</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login')?'active':'' }}" href="{{route('login')}}">Вход</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register')?'active':'' }}" href="{{route('register')}}">Регистрация</a>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
