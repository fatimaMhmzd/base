<?php

namespace Modules\ContactUs\Http\Requests\contactUs;

use Illuminate\Foundation\Http\FormRequest;

class ValidateContactUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|string',
            'mobile' => 'nullable|string',
            'title' => 'nullable|string',
            'message' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => "نام",
            'message' => "متن پیام",
        ];
    }
}
