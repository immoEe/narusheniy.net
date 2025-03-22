<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Нарушений.net</title>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <h1 style="color: #1976d2;">Добро пожаловать на Нарушений.net</h1>
        <div class="buttons">
            @auth
                <a href="{{ route('post.index', ['id' => Auth::id()]) }}" class="btn edit-btn">Личный кабинет</a>
            @else
                <a href="{{ route('login') }}" class="btn logout-btn">Вход</a>
                <a href="{{ route('register') }}" class="btn edit-btn">Регистрация</a>
            @endauth
        </div>
    </div>
    </div>
</body>
</html>