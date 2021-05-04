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
class LoginController extends Controller
{
    /**
     * @param Login $request
     * @return bool
     */
    public function login(Login $request){
        $login = new \App\Layers\Login\Login();
        $isLoginSuccess = $login->login($request);

        return $isLoginSuccess;
    }

}
