<h1>Добавить книгу</h1>
<form action="{{ route('books.index') }}" method="POST">
    @csrf
    Название: <input name="title" required><br>
    Автор: <input name="author" required><br>
    Дата: <input type="date" name="published_at" required><br>
    <button type="submit">Сохранить</button>
</form>
