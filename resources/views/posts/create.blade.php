<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Создать заявку</title>
</head>
<body>
<div class="post-container">
    <h1>Создание новой заявки</h1>
    
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" required>
        </div>
        
        <div class="form-group">
            <label for="content">Описание</label>
            <textarea id="content" name="content" rows="5" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Создать заявку</button>
    </form>
</div>

</body>
</html>