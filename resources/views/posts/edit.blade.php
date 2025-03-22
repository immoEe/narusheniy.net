<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Обновить заявку</title>
</head>
<body>

<div class="post-container">
    <h1>Редактирование заявки</h1>
    
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="content">Описание</label>
            <textarea id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>

</body>
</html>