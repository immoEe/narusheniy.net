<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Подтвердите пароль</title>
    </head>
    <body>
    <div class="auth-container">
    <div class="auth-container">
    <div class="alert alert-info">
        Пожалуйста, подтвердите ваш пароль для продолжения.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="alert alert-error mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
    </div>
    </div>

</body>
</html>