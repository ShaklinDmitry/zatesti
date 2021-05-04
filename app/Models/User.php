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
     */
    public function getUserByLogin($login){
        return $this->select('*')->where([
            ['login', '=', $login]
        ])->first();
    }


}
