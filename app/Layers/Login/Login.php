<?php


namespace App\Layers\Login;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login
{
    public function login($request){
        $login = $request->login;
        $password = $request->password;

        $userModel = new User();
        $user = $userModel->getUserByLogin($login);

        if(Hash::check($password, $user->password)) {
            return json_encode('password matches');
        }

        return false;
    }
}
