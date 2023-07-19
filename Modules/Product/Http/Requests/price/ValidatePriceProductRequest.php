<?php

namespace Modules\Product\Http\Requests\price;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePriceProductRequest extends FormRequest
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
            'price' => 'required|integer',
            'number' => 'required|integer',


        ];
    }

    public function attributes(): array
    {
        return [];
    }
}

