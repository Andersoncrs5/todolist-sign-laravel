<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'string', 'max:50'],
            'description' => ['required', 'min:10', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a valid text.',
            'title.min' => 'The title must be at least 5 characters.',
            'title.max' => 'The title must not exceed 50 characters.',

            'description.required' => 'The description field is required.',
            'description.min' => 'The description must be at least 10 characters.',
            'description.max' => 'The description must not exceed 100 characters.',
        ];
    }

}
