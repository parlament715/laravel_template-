<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_books_page()
    {
        $response = $this->get('/table'); // Проверь маршрут

        $response->assertStatus(200); // Страница доступна
        $response->assertSee('Книги'); // Проверка заголовка
    }

    /** @test */
    public function it_displays_books_in_table()
    {
        // Создаём тестовые данные
        Book::factory()->create([
            'title' => 'Тестовая книга',
            'author' => 'Иван Иванов',
            'published_at' => '2020-01-01',
        ]);

        $response = $this->get('/table');

        $response->assertSee('Тестовая книга',False);
        $response->assertSee('Иван Иванов');
        $response->assertSee('2020-01-01');
    }
}
