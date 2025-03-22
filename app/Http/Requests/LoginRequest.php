<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'min:8', 'max:100'],
            'password' => ['required', 'min:8', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'Invalid email format.',
            'email.max' => 'The email field must not exceed 100 characters.',
            'email.min' => 'The email field must be at least 8 characters long.',

            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.max' => 'The password must not exceed 50 characters.',
        ];
    }

}
