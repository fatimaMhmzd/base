<?php

namespace Modules\Blog\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'group_id' => 'required|integer',
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'link' => 'nullable|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'lable' => 'nullable|array',

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
