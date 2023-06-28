<?php

namespace App\Http\Requests\Request;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'content' => 'required|string|max:500',
            'category_id' => [
                'required',
                Rule::in([
                    Category::LAND_DISPUTES,
                    Category::FAMILY_DISPUTES,
                    Category::LABOR_DISPUTES,
                    Category::TRAFFIC_POLICE_DISPUTES
                ]),
            ],
            'image' => 'image', // Правила валидации для поля image
        ];
    }
}
