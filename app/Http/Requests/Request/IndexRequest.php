<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'limit' => 'required|integer|max:30',
            'offset' => 'required|integer',
            'status' => 'string',
            'date_begin' => 'date',
            'date_end' => 'date|after_or_equal:date_begin',
        ];
    }
}
