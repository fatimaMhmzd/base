<?php

namespace Modules\Group\Http\Requests\group;

use Illuminate\Foundation\Http\FormRequest;

class ValidateGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
//        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'title' => 'required|string',
            'father_id' => 'required',
            'file' => 'nullable|image|mimes:jpg,png|max:5000',
        ];
    }




}
