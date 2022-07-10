<?php

namespace App\Http\Requests\Api\Catalog;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'catalog_ids.*' => 'required|integer|exists:catalogs,id',
        ];
    }
}
