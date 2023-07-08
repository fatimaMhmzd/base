<?php

namespace Modules\Size\Http\Requests\size;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSizeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'unit_id' =>'required|integer',
            'title' => 'required|string',
            'sub_title' => 'nullable|string',
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
