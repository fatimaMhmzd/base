<?php

namespace Modules\Product\Http\Requests\productGroup;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductGroupRequest extends FormRequest
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
            'sub_title' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpg,png|max:5000',
            'description' => 'nullable|string',
            'father_id' => 'nullable|integer',

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}

