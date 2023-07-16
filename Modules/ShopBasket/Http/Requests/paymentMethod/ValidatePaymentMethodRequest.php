<?php

namespace Modules\ShopBasket\Http\Requests\paymentMethod;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePaymentMethodRequest extends FormRequest
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
            'description' => 'nullable|string',

        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
