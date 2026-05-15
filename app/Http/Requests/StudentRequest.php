<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($this->student)
            ],
            'phone' => "required|string|max:20",
            'address' => "required|string|max:255",
            'image' => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ];
    }
}
