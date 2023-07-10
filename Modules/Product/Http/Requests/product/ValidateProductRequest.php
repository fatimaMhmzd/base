<?php

namespace Modules\Product\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'sub_title' => 'nullable|string',
            'file' => 'nullable|array',
            'brand' => 'required|string',
            'full_title' => 'nullable|string',
            'product_group_id' => 'required|integer',
            'price' => 'nullable|integer',
            'off_price' => 'nullable|integer',
            'off' => 'nullable|integer',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'available' => 'nullable|integer',
            'slug' => 'nullable|string',
            'link' => 'nullable|string',
            'key_word' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'weight' => 'nullable|integer',
            'weight_with_packaging' => 'nullable|integer',
            'unit_weight' => 'nullable|integer',
            'status' => 'nullable|string',
            'barcode' => 'nullable|integer',
            'creator' => 'nullable|integer',
            'updater' => 'nullable|integer',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
