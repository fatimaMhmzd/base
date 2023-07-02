<?php

namespace Modules\Slider\Http\Requests\slider;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'page_id' => 'required|integer|exists:page,id',
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
