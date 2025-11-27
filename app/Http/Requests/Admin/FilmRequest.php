<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'duration' => ['required', 'integer', 'min:1'],
            'year_of_issue' => ['required', 'integer', 'min:1920'],
            'age' => ['required', 'integer', 'min:0', 'max:21'],
            'link_img' => ['nullable', 'string', 'max:2048'],
            'link_kinopoisk' => ['nullable', 'string', 'max:2048'],
            'link_video' => ['required', 'string', 'max:2048']

        ];
    }
}
