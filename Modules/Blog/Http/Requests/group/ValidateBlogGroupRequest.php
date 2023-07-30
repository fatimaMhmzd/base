<?php

namespace Modules\Blog\Http\Requests\group;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBlogGroupRequest extends FormRequest
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

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
