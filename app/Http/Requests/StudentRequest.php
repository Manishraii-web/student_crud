<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
        'email'=>"required|email|unique:students,email",
        'phone'=>"required|string|max:20",
        'address'=>"required|string|max:255",
        'image'=>"required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ];
    }
}
