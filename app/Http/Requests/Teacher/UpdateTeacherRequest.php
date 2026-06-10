<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
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
        $userId = Teacher::find($this->route('teacher'))?->user_id;

        return [
           'name'=> 'required|string|max:50',
            'email'=> [
                'required','email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => 'required|string|max:13',
            'subject' => 'required|string'
        ];
    }
}
