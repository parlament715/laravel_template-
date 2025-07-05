<h1>Редактировать книгу</h1>
<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf @method('PUT')
    Название: <input name="title" value="{{ $book->title }}"><br>
    Автор: <input name="author" value="{{ $book->author }}"><br>
    Дата: <input type="date" name="published_at" value="{{ $book->published_at }}" required><br>
    <button type="submit">Обновить</button>
</form>
