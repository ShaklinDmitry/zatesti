<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistartion;
use App\Layers\Registration\Registration;
use Illuminate\Support\Facades\Validator;

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
    public function register(Request $request){

        $validator = Validator::make($request -> all(),[
            'login' => 'unique:users',
            'email' => 'unique:users',
        ], $messages = [
            'unique' => 'User with this :attribute already exists.'
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            $responseData = [
                "error" => [
                    "code" => 422,
                    "message" => $errors -> all()
                ]
            ];
            return response() -> json($responseData,422);
        }else{
            $registration = new Registration();
            $result = $registration->createUser($request);

            $responseData = [
                "data" => [
                    "message" => "Registration was successfull."
                ]
            ];
            return response() -> json($responseData, 201);
        }
    }

}
