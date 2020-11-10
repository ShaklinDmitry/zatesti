<?php

namespace App\Http\Controllers;

use App\Classes\Login\LoginHelper;
use Illuminate\Http\Request;

/**
 * controller for login in system
 *
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    public function login(Request $request){
        $token = $request->input('token');

        if(isTokenValid()){
            $loginHelper = new LoginHelper();

            $data = $loginHelper->getUserDataFromRequest($request);

            $loginState = $loginHelper->loginUser($data);
        }else{
            $login = getLoginByToken();

            $loginState = [
                'login' => $login,
                'loginState' => true,
                'token' => $token
            ];
        }

        return $loginState;
    }
}
