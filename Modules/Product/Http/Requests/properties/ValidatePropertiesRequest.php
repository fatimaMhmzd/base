<?php

namespace Modules\Product\Http\Requests\properties;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePropertiesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer',
            'color_id' => 'nullable|integer',
            'size_id' => 'nullable|integer',
            'price' => 'nullable|integer',
            'available' => 'nullable|integer',
            'status' => 'nullable|integer',
            'file' => 'nullable|image|mimes:jpg,png|max:5000',
            'description' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
