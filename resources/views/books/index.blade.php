<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Дополнительные стили -->
    @stack('styles')
</head>
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Название</th>
                        <th scope="col" class="px-4 py-3">Автор</th>
                        <th scope="col" class="px-4 py-3">Дата публикации</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b dark:border-gray-700">
                        @foreach($books as $book)
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $book->title }}</th>
                        <td class="px-4 py-3">{{ $book->author }}</td>
                        <td class="px-4 py-3">{{ $book->published_at }}</td>
                        <td class="px-4 py-3 flex items-center justify-end">
                            <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                            <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                    <li>
                                        <form action="{{ route('books.edit', $book) }}" method="GET">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                Изменить
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                Удалить
                                            </button>
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <hr />
            {{ $books->links() }}
        </div>
    </div>
</section>
{{--<body class="bg-gray-50 min-h-screen flex flex-col">--}}
{{--<h1>Books</h1>--}}
{{--<a href="{{ route('books.create') }}">Добавить книгу</a>--}}
{{--<table border="1">--}}
{{--    <thead>--}}
{{--        <th>Название</th>--}}
{{--        <th>Автор</th>--}}
{{--        <th>Дата публикации</th>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach($books as $book)--}}
{{--        <tr>--}}
{{--            <td>{{ $book->title }}</td>--}}
{{--            <td>{{ $book->author }}</td>--}}
{{--            <td>{{ $book->published_at }}</td>--}}
{{--            <td>--}}
{{--                <form action="{{ route('books.edit', $book) }}" method="GET" style="display:inline;">--}}
{{--                    @csrf @method('GET')--}}
{{--                    <button type="submit">Редактировать</button>--}}
{{--                </form>--}}
{{--                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">--}}
{{--                    @csrf @method('DELETE')--}}
{{--                    <button type="submit">Удалить</button>--}}
{{--                </form>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}

{{--    </tbody>--}}

{{--</table>--}}


@stack('scripts')

<!-- Инициализация Flowbite компонентов -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Инициализация мобильного меню
        const mobileMenuButton = document.querySelector('[data-collapse-toggle="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
                const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', !expanded);
            });
        }
    });
</script>
</body>
</html>
