<h1>Books</h1>
<a href="{{ route('books.create') }}">Добавить книгу</a>
<table border="1">
    <thead>
        <th>Название</th>
        <th>Автор</th>
        <th>Дата публикации</th>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->published_at }}</td>
            <td>
                <form action="{{ route('books.edit', $book) }}" method="GET" style="display:inline;">
                    @csrf @method('GET')
                    <button type="submit">Редактировать</button>
                </form>
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<style>
    .pagination {
        list-style: none;
        padding-left: 0;
        /*display: flex;*/
        gap: 0.5rem;
        justify-content: center;
    }

    .pagination li {
        display: inline-block;
    }
</style>


    {{ $books->links('pagination::bootstrap-4') }}



