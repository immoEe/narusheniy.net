<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Вход</title>
    <body>
    <div class="auth-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="wrapper">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="remember">
                Запомнить меня
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Войти</button>
        
        <div class="text-center mt-2">
            <a href="{{ route('password.request') }}" class="link">Забыли пароль?</a>
        </div>
        </div>
    </form>
    </div>
    </body>
</html>

