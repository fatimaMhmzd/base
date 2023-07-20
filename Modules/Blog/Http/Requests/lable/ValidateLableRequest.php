<?php

namespace Modules\Blog\Http\Requests\lable;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLableRequest extends FormRequest
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
            'link' => 'nullable|string',

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
