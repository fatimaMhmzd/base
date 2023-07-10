<?php

namespace Modules\Color\Http\Requests\color;

use Illuminate\Foundation\Http\FormRequest;

class ValidateColorRequest extends FormRequest
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
            'code' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
