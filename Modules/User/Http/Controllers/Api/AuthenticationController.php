<?php

namespace Modules\User\Http\Controllers\api;

use App\Helper\Response\ResponseHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Services\AuthenticationService;

class AuthenticationController extends Controller
{

    public function __construct(public AuthenticationService $authenticationService)
    {
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'انتخاب شهرستان الزامی است',
            'mobile.required' => 'نام شهر الزامی است',
            'password.required' => 'نام شهر الزامی است',

        ]);


        $user = $this->authenticationService->register($request);
        return $user ? ResponseHelper::responseSuccessStore(object: $user) : ResponseHelper::responseFailedStore();

    }
}
