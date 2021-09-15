<?php


namespace App\Layers\Login;


use App\Layers\Tokens\Token;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Login
{
    /**
     * @param $request
     * @return bool
     * @throws \Exception || bool
     */
    public function login($request){
        $login = $request->login;
        $password = $request->password;

        $userModel = new User();
        $user = $userModel->getUserByLogin($login);

        if(Hash::check($password, $user->password)) {

            $user->token = Token::generateToken();
            $isTokenSaved = $user->save();

            if(!$isTokenSaved){
                throw new \Exception('Could not generate a token and save it on login');
            }

            return ['token' => $user->token];
        }

        return false;
    }
}
