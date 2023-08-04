<?php

namespace Modules\Address\Http\Requests\address;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddressRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'country_id' => 'required|string',
            'province_id' => 'required|string',
            'city_id' => 'nullable|string',
            'address' => 'required|string',
            'post_code' => 'nullable|string',
            'name' => 'nullable|string',
            'family' => 'nullable|string',
            'national_code' => 'nullable|string',
            'mobile' => 'nullable|string',
            'tel' => 'nullable|string',
            'email' => 'nullable|string',
            'company' => 'nullable|string',
            'description' => 'nullable|string',

        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
