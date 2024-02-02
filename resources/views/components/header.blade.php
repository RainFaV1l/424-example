<header class="header">
    <div class="header__container container">
        <div class="header__logo logo">
            <a class="logo__logo" href="{{ route('index.index') }}">Logo</a>
        </div>
        <nav class="header__nav">
            <ul class="header__menu menu">
                <li class="menu__item"><a href="{{ route('index.index') }}" class="menu__link">Главная</a></li>
                @auth
                    @if(auth()->user()->role_id === 3)
                        <li class="menu__item"><a href="{{ route('category.index') }}" class="menu__link">Категории</a></li>
                    @endif
                    <li class="menu__item"><a href="{{ route('tasks.index') }}" class="menu__link">Задачи</a></li>
                    <li class="menu__item"><a href="{{ route('cart.index') }}" class="menu__link">Корзина</a></li>
                    <li class="menu__item"><a href="{{ route('user.profile') }}" class="menu__link">Профиль</a></li>
                @endauth
            </ul>
        </nav>
        <div class="header__buttons">
            @guest
                <a href="{{ route('user.loginPage') }}" class="header__button button">Войти</a>
                <a href="{{ route('user.registerPage') }}" class="header__button button">Регистрация</a>
            @endguest
            @auth
                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="header__button button">Выход</button>
                </form>
            @endauth
        </div>
    </div>
</header>
