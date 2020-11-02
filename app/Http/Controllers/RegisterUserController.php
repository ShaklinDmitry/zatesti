<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function register(Request $request){

        $login = $request->input('login');
        $password = $request->input('password');


        return false;
    }

}
