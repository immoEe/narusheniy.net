<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Регистрация</title>
    <body>
    <div class="auth container">
    <div class="alert alert-info">
        Спасибо за регистрацию! Перед началом работы подтвердите ваш email, перейдя по ссылке в письме.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Новая ссылка для подтверждения была отправлена на ваш email.
        </div>
    @endif

    <div class="form-group">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Отправить письмо повторно</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="btn btn-error">Выйти</button>
        </form>
    </div>
    </body>
    </div>
</html>