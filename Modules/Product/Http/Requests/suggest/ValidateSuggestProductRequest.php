<?php

namespace Modules\Product\Http\Requests\suggest;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSuggestProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'suggest_id' => 'required|integer',
            'product_id' => 'required|integer',

        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
