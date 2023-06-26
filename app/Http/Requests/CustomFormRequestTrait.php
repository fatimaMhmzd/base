<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Authentication\Entities\User;
use Modules\Authentication\Entities\UserMobile;
use Modules\Authentication\Http\Repositories\UserRepository;
use Modules\Authentication\Services\AuthenticationService;

trait CustomFormRequestTrait
{
    private function set_validator_username()
    {
        # username
        Validator::extend('username', function ($attribute, $timeValue, $parameters) {
            // قوانینی برای تعیین اینکه نام کاربری استاندارد باشد
            return true;
        }, trans_('custom.validation.username', 'قالب :attribute شما نادرست است'));
    }


    private function set_validator_Longitude()
    {
        $message= ':attribute وارد شده معتبر نیست';
        Validator::extend('Longitude', function ($attribute, $value, $parameters){
            return /*is_float($value) && */between(number:floatval($value),min:-90,max:90);
        }, $message);
    }

    private function set_validator_Latitude()
    {
        $message= ':attribute وارد شده معتبر نیست';
        Validator::extend('Latitude', function ($attribute, $value, $parameters){
            return /*is_float($value) && */between(number:floatval($value),min:-180,max:180);
        }, $message);
    }

    private function set_validator_mimes_allowable_image()
    {
        # mimes_allowable_image todo
        Validator::extend('mimes_allowable_image', function ($attribute, $timeValue, $parameters) {
            return true;
        }, trans_('custom.validation.username', 'قالب :attribute شما نادرست است'));
    }

    private function set_validator_national_code()
    {
        # national_code
        Validator::extend('national_code', function ($attribute, $national_code, $parameters) {
            // todo for a test 1111111111
            if ('1111111111' == $national_code) {
                return true;
            }
            if (!preg_match('/^\d{8,10}$/', $national_code) || preg_match('/^[0]{10}|[1]{10}|[2]{10}|[3]{10}|[4]{10}|[5]{10}|[6]{10}|[7]{10}|[8]{10}|[9]{10}$/', $national_code)) {
                return false;
            }
            $sub = 0;
            if (strlen($national_code) == 8) {
                $national_code = '00' . $national_code;
            } elseif (strlen($national_code) == 9) {
                $national_code = '0' . $national_code;
            }

            for ($i = 0; $i <= 8; $i++) {
                $sub = $sub + ($national_code[$i] * (10 - $i));
            }

            if (($sub % 11) < 2) {
                $control = ($sub % 11);
            } else {
                $control = 11 - ($sub % 11);
            }
            if ($national_code[9] == $control) {
                return true;
            } else {
                return false;
            }
        }, trans_('custom.validation.national_code'));
    }

    private function set_validator_image_valid()
    {
        # image_valid
        Validator::extend('image_valid', function ($attribute, $image_valid, $parameters) {
//            return \Illuminate\Validation\Rule::mixin()
        }, trans('custom.validation'));
    }

    private function set_validator_just_string_english()
    {
        # just_string_english
        Validator::extend('just_string_english', function ($attribute, $string_value, $parameters) {
            return is_string_english($string_value, true);
        }, trans_('custom.validation.just_string_english'));
    }

    private function set_validator_just_string_persian()
    {
        # just_string_persian
        Validator::extend('just_string_persian', function ($attribute, $string_value, $parameters) {
            return is_string_persian($string_value, true);
        }, "فیلد :attribute فقط میتواند شامل حرف انگلیسی باشد");
    }

    private function set_validator_username_or_mobile()
    {
        # username_or_mobile
        Validator::extend('username_or_mobile', function ($attribute, $value, $parameters) {
            // قوانینی برای تعیین اینکه نام کاربری استاندارد باشد
            return
                User::query()->where('username', $value)->exists() ||
                UserMobile::query()->where('mobile', $value)->exists();
        }, "شخصی با این نام کاربری/شماره موبایل وجود ندارد");
    }

    private function set_validator_censorship()
    {
        # censorship
        Validator::extend('censorship', function ($attribute, $timeValue, $parameters) {
            // سانسور حرف های رکیک و زشت
            return true;
        }, "قالب :attribute شما نادرست است");
    }

    private function set_validator_likes()
    {
        # likes
        Validator::extend('likes', function ($attribute, $value, $parameters) {
            $table_name = $parameters[0];
            $column_name = $parameters[1];
            return DB::table($table_name)->where($column_name, 'like', '%' . $value . '%')->count() > 0;
        }, "مقدار :attribute معتبر نیست");
    }

    private function set_validator_update_unique()
    {
        # update_unique
        Validator::extend('update_unique', function ($attribute, $value, $parameters) {
            $table_name = $parameters[0];
            $column_name = $parameters[1];
            $id = $parameters[2] ?? request('id') ?? null;
            return DB::table($table_name)->where('id', '!=', $id)->where($column_name, $value)->doesntExist();
        }, trans_('custom.validation.update_unique'));
    }

    private function set_validator_mobile()
    {
        # mobile
        Validator::extend('mobile', function ($attribute, $mobileValue, $parameters) {
            return mobile($mobileValue);
        }, "قالب :attribute شما نادرست است");
    }

    private function set_validator_check_allow_send_code()
    {
        # check_allow_send_code
        Validator::extend('check_allow_send_code', function ($attribute, $mobile, $parameters) {
            $cache_information = cache()->get($mobile) ?? null;
            if ($cache_information) {
                $expired_time = $cache_information['expired_time'] ?? null;
                return $expired_time && now() > Carbon::make($expired_time);
            }
            return true;
        }, trans_('custom.users.messages.otp_check_allow_send_code'));
    }

    private function set_validator_check_mobile_exist_in_cache()
    {
        # check_mobile_exist_in_cache
        Validator::extend('check_mobile_exist_in_cache', function ($attribute, $mobile, $parameters) {
            return filled($mobile) && cache()->has($mobile);
        }, trans_('custom.users.messages.otp_check_mobile_exist_in_cache'));
    }

    private function set_validator_check_allow_send_code_again()
    {
        # check_allow_send_code_again
        Validator::extend('check_allow_send_code_again', function ($attribute, $mobile, $parameters) {
            if (cache()->has($mobile) && $cache_information = cache()->get($mobile)) {
                $expired_time = $cache_information['expired_time'] ?? null;
                return $expired_time && now() > Carbon::make($expired_time);
            }
            return false;
        }, trans_('custom.users.messages.otp_check_allow_send_code'));
    }

    private function set_validator_password()
    {
        # password
        Validator::extend('password', function ($attribute, $password_value, $parameters) {
            return password($password_value);
        }, ":attribute شما قدرتمند نیست");
    }

    private function set_validator_telephone()
    {
        # telephone
        Validator::extend('telephone', function ($attribute, $telephone_value, $parameters) {
            return telephone($telephone_value);
        }, "قالب :attribute شما نادرست است");
    }

    private function helper_otp_confirm($attribute, $code_value, $parameters): bool
    {
        $mobile = request()->get('mobile');
        if (cache()->has($mobile)) {
            $cache_information = cache()->get($mobile);
            $code = $cache_information['code'] ?? null;
            return $code_value == $code;
        }
        return false;
    }

    private function set_validator_otp_confirm()
    {
        Validator::extend('otp_confirm', function ($attribute, $code_value, $parameters) /*use(&$message)*/ {
            return $this->helper_otp_confirm(attribute: $attribute, code_value: $code_value, parameters: $parameters);
        }, 'کد وارد شده با کد ارسالی مطابقت ندارد');
    }

    private function helper_otp_check_expired_time($attribute, $code_value, $parameters): bool
    {
        $mobile = request()->get('mobile');
        if (cache()->has($mobile)) {
            $cache_information = cache()->get($mobile);
            $expired_time = $cache_information['expired_time'] ?? null;
            return now() <= Carbon::make($expired_time);
        }
        return false;
    }

    private function set_validator_otp_check_expired_time()
    {
        Validator::extend('otp_check_expired_time', function ($attribute, $code_value, $parameters) /*use(&$message)*/ {
            return $this->helper_otp_check_expired_time($attribute, $code_value, $parameters);
        }, 'زمان کد منقضی شده');
    }

    private function set_validator_check_user_have_token()
    {
        Validator::extend('check_user_have_token', function ($attribute, $code_value, $parameters) /*use(&$message)*/ {
            $otp_confirm = $this->helper_otp_confirm($attribute, $code_value, $parameters);
            $otp_check_expired_time = $this->helper_otp_check_expired_time($attribute, $code_value, $parameters);
            if ($otp_confirm && $otp_check_expired_time) {
                $mobile = request()->get('mobile');
                if (cache()->has($mobile)) {
                    /** @var User $user */
//                    $user=(new AuthenticationService(new ConfigRepository()))->resolve_user_or_register($mobile);
                    # if($user && $user->tokens)
                }
            }
        }, 'زمان کد منقضی شده');
    }

    private function set_validator_otp_check_expired_time_and_resend_code()
    {
        $message = "کد منقضی شده بود دوباره برای شما ارسال شد";
        Validator::extend('otp_check_expired_time_and_resend_code', function ($attribute, $code_value, $parameters) /*use(&$message)*/ {
            $mobile = request()->get('mobile');
            if (cache()->has($mobile)) {
                $cache_information = cache()->get($mobile);
                $expired_time = $cache_information['expired_time'] ?? null;
                if (now() > Carbon::make($expired_time)) {
                    $authentication_service = (new AuthenticationService(new UserRepository()));
                    $code = $authentication_service->generate_otp_random();
                    $authentication_service->send_notification_otp($mobile, $code);
                }
                return true;
            }
            return false;
        }, $message);
    }

    private function set_validators()
    {
        $this->set_validator_check_mobile_exist_in_cache();
        $this->set_validator_Latitude();
        $this->set_validator_Longitude();
        $this->set_validator_username();
        $this->set_validator_image_valid();
        $this->set_validator_censorship();
        $this->set_validator_update_unique();
        $this->set_validator_likes();
        $this->set_validator_mobile();
        $this->set_validator_password();
        $this->set_validator_telephone();
        $this->set_validator_otp_confirm();
    }
}
