<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Пользователи</title>
</head>
<body>
<div class="buttons">
    <button class="btn logout-btn admin-btn" onclick="showModal()">Выйти</button>
</div>
@if($users->isEmpty())
    <div class="no-users-message">
        Нет пользователей для отображения.
    </div>
@else
<div class="user-grid">
    @foreach($users as $user)
    <div class="user-card">
        <div class="user-info">
            <h3>{{ $user->name }}</h3>
            <p>ID: {{ $user->id }}</p>
            <p>Заявок: {{ $user->posts_count }}</p>
        </div>
        <div class="user-actions">
            <div class=""><a href="{{ route('admin.user.posts', $user) }}" id="btnAdmin" class="btn edit-btn">Просмотр заявок</a></div>
            <form class="form" method="POST" action="{{ route('admin.users.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn logout-btn" 
                    onclick="return confirm('Удалить пользователя и все его заявки?')">
                    Удалить
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="modal-overlay" id="modalOverlay">
        <div class="modal-content">
            <h3>Вы уверены, что хотите выйти?</h3>
            <div class="modal-buttons">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn modal-btn logout-btn">Выйти</button>
                </form>
            </div>
        </div>
    </div>

<script>
     function showModal() {
        document.getElementById('modalOverlay').style.display = 'flex';
    }
    
    function hideModal() {
        document.getElementById('modalOverlay').style.display = 'none';
    }

    document.getElementById('modalOverlay').addEventListener('click', function(e) {
        if(e.target === this) hideModal();
    });
</script>
</body>
</html>