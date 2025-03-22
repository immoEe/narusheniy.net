<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Регистрация</title>
    <body>
    <form method="POST" class="reg-form" action="{{ route('register') }}">
        @csrf
        <div class="auth-container">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="alert alert-error mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="alert alert-error mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="alert alert-error mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn edit-btn">Зарегистрироваться</button>
            <div class="text-center" style="margin-top: 20px">
                Уже зарегистрированы? <a href="{{ route('login') }}" class="link">Войти</a>
            </div>
        </div>
        </div>
    </form>
    </body>
</html>
