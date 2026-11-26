<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'duration' => 'sometimes|required|string|max:100',
            'fee' => 'sometimes|required|numeric|min:0',
            'difficulty' => 'sometimes|required|string|max:100',
            'is_active' => 'sometimes|required|boolean',
        ];
    }
}
