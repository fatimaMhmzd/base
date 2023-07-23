<?php

namespace Modules\Product\Http\Requests\wishList;

use Illuminate\Foundation\Http\FormRequest;

class ValidateWishListRequest extends FormRequest
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


        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
