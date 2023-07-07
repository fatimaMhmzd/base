<?php

namespace Modules\Location\Http\Requests\province;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProvinceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'country_id' => 'nullable|integer',
            'fa_name' => 'required|string',
            'en_name' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'fa_name' => "عنوان",
        ];
    }
}
