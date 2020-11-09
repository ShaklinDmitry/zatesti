<?php
/**
 * Created by PhpStorm.
 * User: dimasaklin
 * Date: 09.11.2020
 * Time: 12:31
 */

namespace App\Classes\Login;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/**
 * class that contains methods that used in login
 *
 * Class LoginHelper
 * @package App\Classes\Login
 */
class LoginHelper
{
    /**
     * get params from the request
     *
     * @param $request
     * @return array
     */
    public function getUserDataFromRequest($request){
        $login = $request->input('login');
        $password = $request->input('password');

        return [
            'login' => $login,
            'password' => $password
        ];
    }


    public function loginUser($data){
        $user = User::where('login', $data['login'])->first();

        if (Hash::check($data['password'], $user['password'])) {
            return [
                'login' => $data['login'],
                'loginState' => true
            ];
        }
    }
}