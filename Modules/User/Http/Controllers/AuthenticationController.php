<?php

namespace Modules\User\Http\Controllers;

use App\Helper\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Modules\User\Services\AuthenticationService;

class AuthenticationController extends Controller
{

    public function __construct(public AuthenticationService $authenticationService)
    {
    }
    public function singUp(Request $request)
    {

        $this->validate($request, [
            'mobile' => 'required|digits:11',
            'password' => 'required|min:6',
        ], [

            'mobile.required' => 'شماره موبایل الزامی است',
            'password.required' => 'پسورد الزامی است',

        ]);



        $user = $this->authenticationService->singUp($request);

        if ($user){
            Session::put('mobile',$request->phone);

        }

        return $user ? Auth::loginUsingId($user->id,false) : back()->with('error', true)->with('message', trans("custom.defaults.store_failed"));

    }
    public function singIn(Request $request)
    {

        $this->validate($request, [
            'mobile' => 'required|digits:11',
            'password' => 'required|min:6',
        ], [

            'mobile.required' => 'شماره موبایل الزامی است',
            'password.required' => 'پسورد الزامی است',

        ]);



        $user = $this->authenticationService->singIn($request);

        if ($user){
            Session::put('mobile',$request->phone);

        }

        return $user ? Auth::loginUsingId($user->id,false) : back()->with('error', true)->with('message', trans("custom.defaults.store_failed"));

    }
}
