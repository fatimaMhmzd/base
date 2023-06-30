<?php

namespace Modules\User\Http\Requests\user;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;


class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $statuses_gender = implode(',', User::getStatusGender());
        $statuses_user = implode(',', User::getStatusUser());

/*
        # image
        $list_mimes_allowable_from_upload_image = config_('configs.images.mimes_allowable_from_upload', title: 'type های مجاز عکس برای آپلود');
        $mimes_allowable_from_upload_image = implode(',', $list_mimes_allowable_from_upload_image);*/

        return [
            'name' => 'nullable|string|filled',
            'family' => 'nullable|string|filled',
            'full_name' => 'required|string|filled',
            'father' => 'nullable|string|filled',
            'national_code' => 'nullable|filled|national_code|unique:users,national_code',
            'gender' => "nullable|in:$statuses_gender",
            'birthday' => 'nullable',
            'username' => 'nullable|filled',
            'status' => "nullable|in:$statuses_user",


            /*'avatar' => "nullable|mimes:$mimes_allowable_from_upload_image",*/

            'mobile'=>'required|numeric|mobile|filled|unique:users,mobile',
            'password' => 'required|string|filled',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => trans('custom.users.fields.name'),
            'family' => trans('custom.users.fields.family'),
            'full_name' => trans('custom.users.fields.full_name'),
            'father' => trans('custom.users.fields.father'),
            'national_code' => trans('custom.users.fields.national_code'),
            'gender' => trans('custom.users.fields.gender'),
            'birthday' => trans('custom.users.fields.birthday'),
            'username' => trans('custom.users.fields.username'),
            'status' => trans('custom.users.fields.status'),

          /*  'avatar' => trans_('custom.users.fields.avatar'),*/

            'mobile' => trans('custom.user_mobiles.fields.mobile'),

        ];
    }
}
