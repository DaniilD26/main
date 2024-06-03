<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
  <div class="container-fluid">
  @if (session('success'))
 <div class="alert alert-success">
 {{ session('success') }}
 </div>
 @endif
      <div class="header">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{asset('/images/logo.png')}}" class="logo" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
          </li>
          @guest()
          <li class="nav-item">
            <a class="nav-link" href="{{route('login.create')}}">Войти</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.create')}}">Регистрация</a>
          </li>
          @endguest
          @auth()
          @if(Auth::user()->isAdmin())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Действия
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('users.index')}}">Вывод пользователей</a></li>
              <li><a class="dropdown-item" href="{{route('menu.index')}}">Вывод меню</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{route('users.create')}}">Добавить пользователя</a></li>
              <li><a class="dropdown-item" href="{{route('menu.create')}}">Добавить блюдо</a></li>
            </ul>
          </li>
          @else

          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Выйти</a>
          </li>
          @endauth
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  </div>


      {{-- <img src="{{asset('/images/onlajn-kassy.jpg')}}" alt="kassy"> --}}
      @yield('content')
  
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

