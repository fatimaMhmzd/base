<?php

namespace Modules\Page\Http\Requests\page;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePageRequest extends FormRequest
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
            'sub_title' => 'required|string',
            'file' => 'nullable|image|mimes:jpg,png|max:5000',
            'link' => 'nullable|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
