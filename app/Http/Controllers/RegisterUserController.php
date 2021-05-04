<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistartion;
use App\Layers\Registration\Registration;
/**
 * controller for register user
 *
 * Class RegisterUserController
 * @package App\Http\Controllers
 */
class RegisterUserController extends Controller
{
    /**
     *
     *
     * @param Request $request
     * @return array
     */
    public function register(UserRegistartion $request){
        if($request->getValidationStatus()){
            $registration = new Registration();
            $registration->createUser($request);
            return true;
        }
    }

}
