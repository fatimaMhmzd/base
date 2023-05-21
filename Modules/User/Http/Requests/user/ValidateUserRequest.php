<?php

namespace Modules\User\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'family' => 'nullable|string',
            'full_name' => 'nullable|string',
            'father' => 'nullable|string',
            'national_code' => 'nullable|string',
            'gender' => 'nullable|string',
            'birthday' => 'nullable|boolean',
            'username' => 'nullable|integer',
            'password' => 'nullable|integer',
            'email' => 'nullable|integer',
            'mobile' => 'nullable|integer',
            'nationalCode' => 'nullable|string',
            'code' => 'nullable|string',
            'career' => 'nullable|string',
            'degree' => 'nullable|boolean',
            'status' => 'nullable|boolean',

        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
        ];
    }
}
