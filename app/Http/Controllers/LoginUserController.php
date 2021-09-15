<?php

namespace App\Http\Controllers;

use App\Classes\Login\LoginHelper;
use App\Http\Requests\Login;
use Illuminate\Http\Request;

/**
 * controller for login in system
 *
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginUserController extends Controller
{
    /**
     * @param Login $request
     * @return bool
     */
    public function login(Login $request){
        $login = new \App\Layers\Login\Login();
        $result = $login->login($request);

        if($result['token']){
            $responseData = [
                "data" => [
                    "message" => "login was successfull.",
                    "token" => $result['token']
                ]
            ];

            return response() -> json($responseData, 201);
        }
    }


}
