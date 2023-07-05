<?php

namespace Modules\Unit\Http\Requests\unit;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUnitRequest extends FormRequest
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
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
