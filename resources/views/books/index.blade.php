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
<body class="bg-gray-50 min-h-screen flex flex-col">
<!-- Хедер -->
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">
            {{ config('app.name', 'Laravel') }}
        </a>

        <nav class="hidden md:block">
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-indigo-500">Главная</a></li>
                <li><a href="#" class="hover:text-indigo-500">О нас</a></li>
                <li><a href="#" class="hover:text-indigo-500">Контакты</a></li>
            </ul>
        </nav>

        <!-- Мобильное меню (Flowbite) -->
        <button data-collapse-toggle="mobile-menu" type="button"
                class="md:hidden text-gray-500 hover:text-gray-600 focus:outline-none"
                aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Открыть меню</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Мобильное меню (скрыто по умолчанию) -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600">Главная</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600">О
                нас</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600">Контакты</a>
        </div>
    </div>
</header>

<!-- Основной контент -->
<main class="flex-grow container mx-auto px-4 py-8">
    @yield('content')
</main>
<button type="button"
        class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
    Purple to Pink
</button>
<!-- Футер -->
<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                &copy; {{ date('Y') }} {{ config('app.name') }}. Все права защищены.
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-indigo-300">Политика конфиденциальности</a>
                <a href="#" class="hover:text-indigo-300">Условия использования</a>
            </div>
        </div>
    </div>
</footer>

<!-- Дополнительные скрипты -->
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
{{--<h1>Books</h1>--}}
{{--<a href="{{ route('books.create') }}">Добавить книгу</a>--}}
{{--<body>--}}
{{--<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 px-5 py-2.5 rounded-lg">--}}
{{--    Flowbite Button--}}
{{--</button>--}}
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
{{--</body>--}}
{{--<style>--}}
{{--    .pagination {--}}
{{--        list-style: none;--}}
{{--        padding-left: 0;--}}
{{--        /*display: flex;*/--}}
{{--        gap: 0.5rem;--}}
{{--        justify-content: center;--}}
{{--    }--}}

{{--    .pagination li {--}}
{{--        display: inline-block;--}}
{{--    }--}}
{{--</style>--}}


{{--    {{ $books->links('pagination::bootstrap-4') }}--}}
