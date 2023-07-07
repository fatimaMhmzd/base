<?php

namespace Modules\Location\Http\Requests\area;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAreaRequest extends FormRequest
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
            'province_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
            'town_id' => 'required|integer',
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
