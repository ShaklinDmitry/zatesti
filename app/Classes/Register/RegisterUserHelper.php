<?php
/**
 * Created by PhpStorm.
 * User: dimasaklin
 * Date: 05.11.2020
 * Time: 15:20
 */

namespace App\Classes\Register;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * class for methods that used in RegisterUserController
 *
 * Class RegisterUserHelper
 * @package App\Classes\Register
 */
class RegisterUserHelper
{
    /**
     * to get params from the request
     * @param $request
     * @return array
     */
    public function getUserDataFromRequest($request){
        $login = $request->input('login');
        $email = $request->input('email');
        $password = $request->input('password');

        return [
                'login' => $login,
                'email' => $email,
                'password' => $password
            ];
    }


    /**
     * save user login,email,password in database user table
     *
     * @param $data  data contains user info from registration request etc email,login
     * @return bool
     */
    public function    saveUserData($data){
        $user = new User();
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password'], [
            'rounds' => 12,
        ]);

        $saveState = $user->save();
        return $saveState;
    }


    const FIELDS_FOR_VALIDATION = ['login', 'email'];
    /**
     * validate user login and email on uniqueness
     *
     * @param $data data contains user info from registration request etc email,login
     * @return array
     */
    public function validateUserData($data){

        $validationResult = [];

        foreach (FIELDS_FOR_VALIDATION as $key=>$value){
            $validationResult[] = validateField($value, $data[$value]);
        }

//        $isLoginValidatedSuccessfully = $this->validateLogin($data['login']);
//
//
//
//        $loginUniqueness = $this->validateLoginUniqueness($data['login']);
//        $emailUniqueness = $this->validateEmailUniqueness($data['email']);
//
//        if(!boolval($loginUniqueness) || !boolval($emailUniqueness)){
//            return false;
//        }
//
//        return true;

    }

    private function validateField($fieldName, $fieldValue){
        $matching = User::where($fieldName, $fieldValue)->first();
        return [
            'fieldName' => $fieldName,
            'isValidationSuccessful' => !boolval($matching)
        ];
    }

    /**
     * validation for uniqueness of login
     *
     * @param $login
     * @return int
     */
    private function validateLogin($login){
        $matchingLoginsCount = User::where('login', $login)->count();
        return !boolval($matchingLoginsCount);
    }


    /**
     * validation for uniqueness of email
     *
     * @param $email
     * @return int
     */
    private function validateEmailUniqueness($email){
        $matchingEmailsCount = User::where('email', $email)->count();
        return $matchingEmailsCount;
    }

}