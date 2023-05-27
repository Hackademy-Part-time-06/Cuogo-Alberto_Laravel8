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
        return true; // sempre true finchè non c'è login o utenti con poteri
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'author' => 'required|string',
            'pages' => 'required|numeric',
            'year' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be of type string',
            'author.required' => 'Author is required',
            'author.required' => 'Author must be of type string',
            'pages.required' => 'N° of Pages in the Book required',
            'pages.numeric' => 'Pages must include numbers only',
            'year.required' => 'Year is required',
            'year.numeric' => 'Year must include numbers only'
        ];
    }
}
