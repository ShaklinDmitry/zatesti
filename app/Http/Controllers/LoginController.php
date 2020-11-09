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
        $loginHelper = new LoginHelper();

        $data = $loginHelper->getUserDataFromRequest($request);

        $loginState = $loginHelper->loginUser($data);



    }
}
