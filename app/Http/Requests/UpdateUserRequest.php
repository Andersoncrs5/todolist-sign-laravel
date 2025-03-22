<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'password' => ['required', 'min:8', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.max' => 'The password must not exceed 50 characters.',

            'name.required' => 'The name field is required.',
            'name.string' => 'The name field be should one string.',
            'name.max' => 'The name must not exceed 50 characters.',
        ];
    }
}
