<?php

namespace Modules\Product\Http\Requests\suggest;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSuggestRequest extends FormRequest
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
            'sort_id' => 'nullable|string',
            'display_on_homepage' => 'nullable|integer',

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}

