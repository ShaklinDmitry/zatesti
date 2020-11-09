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


    /**
     * validate user login and email on uniqueness
     *
     * @param $data data contains user info from registration request etc email,login
     * @return array
     */
    public function validateUserData($data){
        $loginUniqueness = $this->validateLoginUniqueness($data['login']);
        $emailUniqueness = $this->validateEmailUniqueness($data['email']);

        return[
          'loginUniqueness' => !boolval($loginUniqueness),
          'emailUniqueness' => !boolval($emailUniqueness),
        ];
    }

    /**
     * validation for uniqueness of login
     *
     * @param $login
     * @return int
     */
    private function validateLoginUniqueness($login){
        $matchingLoginsCount = User::where('login', $login)->count();
        return $matchingLoginsCount;
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