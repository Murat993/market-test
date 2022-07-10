<?php

namespace App\Http\Requests\Api\Catalog;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'nullable|integer',
            'price' => 'nullable|integer',
            'attribute_id' => 'nullable|integer',
        ];
    }
}
