<?php

namespace App\Http\Controllers;

use App\Classes\Register\UserRegistration;
use Illuminate\Http\Request;
use App\Classes\Register\RegisterUserHelper;
use function PHPUnit\Framework\isEmpty;

/**
 * controller for register user
 *
 * Class RegisterUserController
 * @package App\Http\Controllers
 */
class RegisterUserController extends Controller
{
    /**
     * register action
     *
     * @param Request $request
     * @return array
     */
    public function register(Request $request){

        $registerUserHelper = new RegisterUserHelper();

        $data = $registerUserHelper->getUserDataFromRequest($request);

        $validateDataResult = $registerUserHelper->validateUserData($data);

        if(!$validateDataResult['loginUniqueness'] || !$validateDataResult['emailUniqueness']){
            return $validateDataResult;
        }

        $saveDataResult = $registerUserHelper->saveUserData($data);

        return ['login' => $data['login'],
                'registerState' => $saveDataResult
            ];
    }

}
