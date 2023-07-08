<?php

namespace Modules\User\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Http\Repositories\UserRepository;
use Modules\User\Http\Requests\RegisterRequest;

class AuthenticationService
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    public function singUp(Request $request)
    {

          /*  $fields = $request->validated();*/


            $mobile = $request['mobile'] ?? null;

            $exist = $this->userRepository->findBy("mobile", $mobile);

            if (!$exist) {
                DB::beginTransaction();
                try {
                    $user_fields = [
                        'status' => User::status_unknown,
                        'gender' => User::gender_unknown,
                        'username' => $username ?? null,
                        'mobile' => $request['mobile'],
                        'password' => Hash::make($request['password']),
                        'code' => rand(1111, 9999),
                    ];

                    # save user
                    /** @var User $user */
                    $user = $this->userRepository->create($user_fields);
                    DB::commit();
                    return $user;
                } catch (\Exception $exception) {
                    DB::rollBack();
                    throw new \Exception(trans("custom.defaults.store_failed"));
                }
            }else{
                return null;
            }




    }
    public function singIn(Request $request)
    {

          /*  $fields = $request->validated();*/


            $mobile = $request['mobile'] ?? null;

            $exist = $this->userRepository->findBy("mobile", $mobile);

            if (!$exist) {
            return null;
            }else{
                if (!Hash::check($request['password'] ,$exist->password)){
                    return  null;
                }
                return $exist;

            }




    }


    public static function checkActive($user)
    {
        if ($user->status !== User::status_active) {
            throw new ForbiddenException(
                message: trans('custom.users.messages.user_not_active'),
                code: HttpFoundationResponse::HTTP_FORBIDDEN/* 403 */
            );
        }
    }

    public function login(LoginRequest|array $request)
    {
        try {
            if (is_array($request)) {
                $loginRequest = new LoginRequest();
                $fields = Validator::make(data: $request,
                    rules: $loginRequest->rules(),
                    customAttributes: $loginRequest->attributes(),
                )->validate();
            } else {
                $fields = $request->validated();
            }

            $username_or_mobile = $fields['username'] ?? null;
            $password = $fields['password'] ?? null;

            $role = $fields['role'] ?? null;

            $device_id = $fields['device_id'] ?? null;
            $operation_system = $fields['operation_system'] ?? null;
            $extra_data = $fields['extra_data'] ?? null;

            $device_fields = [
                'device_id' => $device_id,
                'operation_system' => $operation_system,
                'extra_data' => $extra_data,
            ];

            /** @var User $user */
            $user = UserService::getUser(mobile: $username_or_mobile, username: $username_or_mobile);
            if ($user && Hash::check($password, $user->password)) {
                self::checkRole(user: $user, role: $role);
                self::checkActive(user: $user);
                DeviceService::saveAndCheckDevice(user: $user, fields: $device_fields, role: $role);
                cache()->forget($username_or_mobile);
                return self::setTokenAndUser(user: $user, role: $role, mobile: $username_or_mobile);
            }
            abort(HttpFoundationResponse::HTTP_UNAUTHORIZED/* 401 */, trans_('custom.users.messages.login_unauthorized'));
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public static function setApiKey($mobile = null)
    {
        $length_api_key_string = config('configs.api_key.length');
        $expired_time = now()->addMinutes(config('configs.api_key.expired_time_minutes'));
        $api_key = random_string(length: $length_api_key_string);
        cache()->set($api_key, ['mobile' => $mobile, 'expired_time' => $expired_time]);
        return $api_key;
    }

    public static function checkApiKey($api_key, $mobile = null): bool
    {
        $information_in_cache = cache()->get($api_key);
        $mobile_in_cache = $information_in_cache['mobile'] ?? null;
        $expired_time = $information_in_cache['expired_time'] ?? null;
        if (Carbon::make($expired_time) < now()) {
            $message = trans_('custom.users.messages.expired_time_api_key');
            throw new Exception(message: $message, code: HttpFoundationResponse::HTTP_BAD_REQUEST/* 400 */);
        }
        return boolval($mobile_in_cache) /*$mobile_in_cache == $mobile*/ ;
    }

    #[ArrayShape(['token' => "mixed", 'user' => ""])]
    public static function setTokenAndUser($user, $role = null, $mobile = null): array
    {

        $token_name ="login";
        $token = $user?->createToken($token_name)?->plainTextToken ?? null;
        $data = ['token' => $token, 'user' => $user, 'apiKey' => null];
        if (!$token && !$user) {
            $data['apiKey'] = self::setApiKey(mobile: $mobile) ?? null;
        }
        return $data;
    }

    public function otpConfirm(OtpConfirmRequest $request)
    {
        try {
            $fields = $request->validated();

            $mobile = $fields['mobile'] ?? null;

            $role = $fields['role'] ?? null;

            $device_id = $fields['device_id'] ?? null;
            $operation_system = $fields['operation_system'] ?? null;
            $extra_data = $fields['extra_data'] ?? [];

            $device_fields = [
                'device_id' => $device_id,
                'operation_system' => $operation_system,
                'extra_data' => $extra_data,
            ];

            if (/** @var User $user */ $user = UserService::getUser(mobile: $mobile)) {
                self::checkRole(user: $user, role: $role);
                self::checkActive(user: $user);
                DeviceService::saveAndCheckDevice(user: $user, fields: $device_fields, role: $role);
                CustomersService::updateCustomerInstallApplication($user);
                cache()->forget($mobile);
                return self::setTokenAndUser(user: $user, role: $role, mobile: $mobile);
            }
            cache()->forget($mobile);
            return self::setTokenAndUser(user: null, role: $role, mobile: $mobile);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function generate_otp_random(): int
    {
        $min_number_random = config('configs.authentication.otp.min_number_random');
        $max_number_random = config('configs.authentication.otp.max_number_random');
        return rand($min_number_random, $max_number_random);
    }

    public function send_notification_otp($mobile, $otp_random_number)
    {
        if ($mobile) {
            $second_expired = config('configs.authentication.otp.expired_time');
            $expired_time = now()->addSeconds($second_expired);
            return
                send_sms($mobile, $otp_random_number)
                &&
                cache()->set($mobile, ['code' => $otp_random_number, 'expired_time' => $expired_time], $second_expired);
        }
    }

    public function logout()
    {
        return auth()?->user()?->tokens()?->delete();
    }

}
