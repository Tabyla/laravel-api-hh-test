<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (session('selected_city'))
                    <li class="nav-item">
                        <p class="nav-link m-0">Ваш город: <strong>{{ session('selected_city')->name }}</strong></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('city.show', ['alias' => session('selected_city')->alias]) }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('city.news', ['alias' => session('selected_city')->alias]) }}">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('city.about', ['alias' => session('selected_city')->alias]) }}">О нас</a>
                    </li>
                @else
                    <li class="nav-item">
                        <p class="nav-link m-0">Город не выбран</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">О нас</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
