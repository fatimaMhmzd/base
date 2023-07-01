<?php

namespace Modules\User\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\User\Http\Repositories\UserRepository;
use Modules\User\Http\Requests\user\UserStoreRequest;

class UserService
{
    public function __construct(public UserRepository $userRepository)
    {
    }


    public function listStatusUser($status = null)
    {
        return User::getStatusUserTitle($status);
    }


    public function listStatusGender($status = null)
    {
        return User::getStatusGenderTitle($status);
    }

    public function store(UserStoreRequest|array $request)
    {
        DB::beginTransaction();
        try {

            $fields = $request->validated();
         /*   if ($birthday) {
                try {
                    $inputs["birthday"] = Carbon::parse($birthday)->format("Y-m-d");
                } catch (\Exception $exception) {
                    $inputs["birthday"] = null;
                }
            }*/



            /**
             * @var $name
             * @var $family
             * @var $full_name
             * @var $father
             * @var $national_code
             * @var $gender
             * @var $birthday
             * @var $username
             * @var $status
             * @var $mobile
             */
            extract($fields);

            # user
            $user_fields = [
                'name' => $name ?? null,
                'family' => $family ?? null,
                'full_name' => $full_name ?? null,
                'father' => $father ?? null,
                'national_code' => $national_code ?? null,
                'gender' => $gender ?? User::gender_unknown,
                'birthday' => $birthday ?? null,
                'username' => $username ?? null,
                 'status' => $fields['status'] ?? User::status_unknown,
            ];


            # save user
            /** @var User $user */
            $user = $this->userRepository->create($user_fields);

            DB::commit();
            return $user;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }




}
