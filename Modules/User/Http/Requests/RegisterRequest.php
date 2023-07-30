<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\CustomFormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use CustomFormRequestTrait;


    public function rules(): array
    {
        return [
            'mobile'=>'required|numeric|filled|unique:users,mobile',
            'password' => 'required|string|filled',
        ];
    }


    public function attributes(): array
    {
        return [
            'mobile' => 'شماره موبایل',
            'password' => 'رمز عبور',
        ];
    }
}
