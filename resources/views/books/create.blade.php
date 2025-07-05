<h1>Добавить книгу</h1>
@if ($errors->any())
    <strong>Ошибки при заполнении формы:</strong>
    <ul class="mt-2 list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('books.index') }}" method="POST">
    @csrf
    Название: <input name="title" required><br>
    Автор: <input name="author" required><br>
    Дата: <input type="date" name="published_at" required><br>
    <button type="submit">Сохранить</button>
</form>
