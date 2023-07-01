<?php

namespace Modules\User\Http\Requests;

use App\Http\Requests\CustomFormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use CustomFormRequestTrait;

    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        $this->set_validator_mobile();
     /*   $this->set_validator_username();*/
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }


    public function rules(): array
    {
        return [
            'username'=>'required|filled|string',
            'mobile'=>'required|numeric|filled|unique:users,mobile',
            'password' => 'required|string|filled',
        ];
    }


    public function attributes(): array
    {
        return [
            'username' => 'dgf',
            'mobile' => 'fgdhdf',
            'password' => 'dfhdh',
        ];
    }
}
