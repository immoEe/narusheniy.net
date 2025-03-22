<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Восстановить пароль</title>
    <body>
    <div class="auth-container">
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
            @error('email')
                <div class="alert alert-error mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Новый пароль</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="alert alert-error mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Сбросить пароль</button>
    </form>
    </div>
    </body>
</html>
