<?php

namespace Modules\ShopBasket\Http\Requests\sendingMethod;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSendingMethodRequest extends FormRequest
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
            'price' => 'required|integer',
            'description' => 'nullable|string',

        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
