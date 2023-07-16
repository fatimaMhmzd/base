<?php

namespace Modules\Setting\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'key' => 'required|string',
            'value' => 'required|string',
            'label' => 'required|string',
            'file' => 'nullable|image|mimes:jpg,png|max:5000',
        ];
    }

    public function attributes(): array
    {
        return [];
    }
}
