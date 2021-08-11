<?php


namespace App\Layers\Tokens;

use Illuminate\Support\Str;

class Token
{
    public static function generateToken():string{
        $token = Str::random(80);
        return $token;
    }
}
