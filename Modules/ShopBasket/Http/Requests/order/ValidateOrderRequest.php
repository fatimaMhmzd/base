<?php

namespace Modules\ShopBasket\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderRequest extends FormRequest
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
            'count' => 'required|integer',

        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
