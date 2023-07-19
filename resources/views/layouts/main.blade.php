<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<header class="mt-3 mb-3">
    <nav>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="/" class="text-decoration-none text-reset"><i
                            class="navbar-brand fs-4 mr-3">ToDoList</i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Переключатель навигации">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @auth()
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active fs-5" data-bs-toggle="dropdown" href="#"
                                       role="button"
                                       aria-expanded="false">Задачи</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route("tasks.index") }}">Мои задачи</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route("tag.index") }}">Мои тэги</a></li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                        @guest()
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#login">
                                Вход/Регистрация
                            </button>

                            <!-- Модальное окно входа -->
                            <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Закрыть"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="row mb-3">
                                                    <label for="email"
                                                           class="col-md-4 col-form-label text-md-end">Электронная
                                                        почта</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               name="email" value="{{ old('email') }}" required
                                                               autocomplete="email" autofocus>

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password"
                                                           class="col-md-4 col-form-label text-md-end">Пароль</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               name="password" required autocomplete="current-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                      </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#registration">
                                                        Нет аккаунта?
                                                    </button>
                                                    <button type="submit" class="btn btn-secondary">
                                                        Войти
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Модальное окно регистрации -->
                            <div class="modal fade" id="registration" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Закрыть"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="row mb-3">
                                                    <label for="name"
                                                           class="col-md-4 col-form-label text-md-end">{{ __('Имя пользователя') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               name="name" value="{{ old('name') }}" required
                                                               autocomplete="name" autofocus>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="email"
                                                           class="col-md-4 col-form-label text-md-end">{{ __('Эл. почта') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               name="email" value="{{ old('email') }}" required
                                                               autocomplete="email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password"
                                                           class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               name="password" required autocomplete="new-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password-confirm"
                                                           class="col-md-4 col-form-label text-md-end">{{ __('Повторите пароль') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password"
                                                               class="form-control" name="password_confirmation"
                                                               required autocomplete="new-password">
                                                    </div>
                                                </div>

                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Регистрация') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest
                        @auth()
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <input class="btn btn-secondary" type="submit" value="Выйти">
                            </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </nav>
</header>

@yield('content')

<footer>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-12 d-flex align-items-center">
                <p class="mb-3 mb-md-0 text-muted">Тестовое задание для REKA. Исполнитель: Ильяс М.</p>
            </div>

        </footer>
    </div>
</footer>
</body>

</html>
