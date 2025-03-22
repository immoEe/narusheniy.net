<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Главная</title>
</head>
<body>
<div class="post-container">
    <div class="buttons">
        <a href="{{ route('posts.create') }}" class="btn new-post-btn">Создать заявку</a>
        <button class="btn logout-btn" onclick="showModal()">Выйти</button>
    </div>
    
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

    <h1>Мои заявки</h1>
    
    <div class="post-list">
        @if($posts->count() > 0)
            @foreach($posts as $post)
            <div class="post-card">
                <div class="post-header">
                    <div style="flex-grow: 1;">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        @if($post->content)
                            <pre class="post-content">{{ $post->content }}</pre>
                        @endif
                        @if($post->status)
                        <div class="status {{ Str::slug($post->status) }}">
                            Статус заявки: 
                            @if($post->status === 'in_process') В процессе
                            @elseif($post->status === 'denied') Отклонена
                            @elseif($post->status === 'approved') Одобрена
                            @elseif($post->status === 'under_review') На рассмотрении
                            @elseif($post->status === 'completed') Завершена
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="post-actions">
                        <a href="{{ route('posts.edit', $post) }}" class="btn edit-btn">Редактировать</a>
                        <form method="POST" class="form" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete-btn" 
                                    onclick="return confirm('Вы уверены что хотите удалить эту заявку?')">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-info">У вас пока нет заявок</div>
        @endif
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