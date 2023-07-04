<?php

namespace Modules\SocialMedia\Http\Requests\socialMedia;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSocialMediaRequest extends FormRequest
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
            'file' => 'nullable|image|mimes:jpg,png|max:5000',
            'sub_title' => 'nullable|string',
            'link' => 'nullable|string',
            'url' => 'nullable|string',
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