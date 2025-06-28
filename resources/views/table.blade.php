<!DOCTYPE html>
<html>
<head>
    <title>Список книг</title>
</head>
<body>
<h1>Книги</h1>

<table border="1">
    <thead>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Дата публикации</th>
        <th>Время добавления</th>
        <th>Время последнего изменения</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->published_at }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
