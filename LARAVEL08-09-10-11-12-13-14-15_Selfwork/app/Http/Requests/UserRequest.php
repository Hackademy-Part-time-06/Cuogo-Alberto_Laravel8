<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'img' => 'mimes: jpg,jpeg,png',
            'gender' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'User is required',
            'name.string' => 'User must be of type string',
            'img.mimes' => 'Images can be only JPG, JPEG, PNG ',
            'gender.required' => 'Gender is required',
        ];
    }
}
