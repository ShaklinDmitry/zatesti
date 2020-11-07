<?php

namespace App\Http\Controllers;

use App\Classes\Register\UserRegistration;
use Illuminate\Http\Request;
use App\Classes\Register\RegisterUserHelper;

class RegisterUserController extends Controller
{
    public function register(Request $request){

        $registerUserHelper = new RegisterUserHelper();

        $data = $registerUserHelper->getUserDataFromRequest($request);

        $validateDataResult = $registerUserHelper->validateUserData($data);

        return $validateDataResult;

        if($validateDataResult ){
            return $validateDataResult;
        }

        $saveDataResult = $registerUserHelper->saveUserData($data);

        return $saveDataResult;
    }

}
