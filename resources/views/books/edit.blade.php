<h1>Редактировать книгу</h1>
<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf @method('PUT')
    Название: <input name="title" value="{{ $book->title }}"><br>
    @error('title')
    <div style="color:red">{{$message}}</div>
    @enderror
    Автор: <input name="author" value="{{ $book->author }}"><br>
    @error('author')
    <div style="color:red">{{$message}}</div>
    @enderror
    Дата: <input  name="published_at" value="{{ $book->published_at }}" required><br>
    @error('published_at')
    <div style="color:red">{{$message}}</div>
    @enderror
    <button type="submit">Обновить</button>
</form>
