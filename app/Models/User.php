<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  //  use HasFactory;


    public function isTokenValid(){

        if(!checkOnTokenExpireDate() || !checkOnExistance()){
            return false;
        }
        return true;
    }

    /**
     * @param $login
     * @return User user
     */
    public function getUserByLogin($login){
        return $this->select('*')->where([
            ['login', '=', $login]
        ])->first();
    }

    /**
     * @param $email
     * @return User user
     */
    public function getUserByEmail($email){
        return $this->select('*')->where([
            ['email', '=', $email]
        ])->first();
    }
    

}
