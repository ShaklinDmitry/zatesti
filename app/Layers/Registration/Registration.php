<?php


namespace App\Layers\Registration;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Registration
{

    /**
     * @param $request
     * @return mixed
     */
    public function createUser($request){
        $user = new User();
        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = Hash::make($request->password, [
            'rounds' => 12,
        ]);
        $result = $user->save();

        return $result;
    }
}
