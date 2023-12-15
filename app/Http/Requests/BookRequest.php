<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'isbn'  => ['required', 'numeric', 'digits:13'],
            'publisher' => ['required', 'max:100'],
            'author_id' => ['required', 'numeric', 'exists:authors,id'],
            'photo' => ['nullable', 'image', 'file', 'max:1024', 'extensions:jpg,jpeg,png']
        ];
    }
}
