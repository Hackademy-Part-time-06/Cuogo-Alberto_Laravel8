<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string',
            'surname' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'firstname.required' => 'Firstname is required',
            'firstname.string' => 'Firstname must be of type string',
            'surname.required' => 'Surname is required',
            'surname.string' => 'Surname must be of type string',
        ];
    }
}
