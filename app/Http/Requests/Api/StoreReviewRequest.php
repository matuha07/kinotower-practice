<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'film_id' => ['required', 'integer', 'exists:films,id'],
            'message' => ['required', 'string', 'min:4', 'max:1024'],
        ];
    }
}
