<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Заявки</title>
</head>
<body>
    
<div class="admin-posts-container">
    <a href="{{ route('admin.users') }}" class="back-link">← Назад к списку пользователей</a>
    
    <div class="user-info">
        <h2>Заявки пользователя: {{ $user->name }}</h2>
        <p>Email: {{ $user->email }}</p>
        <p>Всего заявок: {{ $posts->count() }}</p>
    </div>

    <div class="post-list">
        @foreach($posts as $post)
        <div class="post-card">
            <div class="post-header">
                <h3 class="post-title">{{ $post->title }}</h3>
                <form method="POST" action="{{ route('admin.posts.update', $post) }}">
                    @csrf
                    @method('PATCH')
                    <select 
                        name="status" 
                        class="status-select"
                        onchange="this.form.submit()"
                    >
                        <option value="in_process" {{ $post->status == 'in_process' ? 'selected' : '' }}>В процессе</option>
                        <option value="approved" {{ $post->status == 'approved' ? 'selected' : '' }}>Одобрено</option>
                        <option value="denied" {{ $post->status == 'denied' ? 'selected' : '' }}>Отклонено</option>
                    </select>
                </form>
            </div>

            <pre class="post-content">{{ $post->content }}</pre>

            <div class="post-actions">
                <form  class="form"
                    method="POST" 
                    action="{{ route('admin.posts.destroy', $post) }}"
                    onsubmit="return confirm('Вы уверены, что хотите удалить эту заявку?')"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn logout-btn">
                        Удалить
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        @if($posts->isEmpty())
        <div class="alert alert-info">
            У этого пользователя нет заявок
        </div>
        @endif
    </div>
</div>

</body>
</html>