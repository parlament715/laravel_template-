<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            "published_at" => "required|date"
        ];
    }

    public function messages() :array
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.unique' => 'Книга с таким названием уже существует.',
            'author.required' => 'Пожалуйста, укажите автора.',
            'published_at.required' => 'Дата публикации обязательна.',
            'published_at.date' => 'Введите корректную дату.',
        ];
    }
}
