<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fio' => ['required', 'string', 'min:2', 'max:150'],
            'email' => [
                'required',
                'email',
                'min:4',
                'max:50',
                Rule::unique('users')->ignore($this->user()->id),
            ],
            'birthday' => ['required', 'date'],
            'gender_id' => ['required', 'exists:genders,id'],
        ];
    }
}
