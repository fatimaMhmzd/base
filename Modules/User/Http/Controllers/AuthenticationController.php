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
        if ($request->check == null) {
            Session::put('check', false);
        } else {
            Session::put('check', true);
        }
        $user = $this->authenticationService->singUp($request);
        if ($user){
            Session::put('mobile',$request->phone);
        }
        if ($user){
            Auth::loginUsingId($user->id,Session::get('check'));
            return Redirect::route('indexClient');
        }else{
            return back()->with('error', true)->with('message', trans("custom.defaults.store_failed"));
        }
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
        if ($request->check == null) {
            Session::put('check', false);
        } else {
            Session::put('check', true);
        }
        $user = $this->authenticationService->singIn($request);

        if ($user){
            Session::put('mobile',$request->phone);
        }

        if ($user){
            Auth::loginUsingId($user->id,Session::get('check'));
            return Redirect::route('indexClient');
        }else{
            return back()->with('error', true)->with('message', trans("custom.defaults.store_failed"));
        }
    }
}
