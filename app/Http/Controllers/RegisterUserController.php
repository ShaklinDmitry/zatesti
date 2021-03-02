<?php

namespace App\Http\Controllers;

use App\Mail\RegistartionConfirmationEmail;
use Illuminate\Http\Request;
use App\Classes\Register\RegisterUserHelper;
use function PHPUnit\Framework\isEmpty;
use App\Http\Requests\UserRegistartion;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
/**
 * controller for register user
 *
 * Class RegisterUserController
 * @package App\Http\Controllers
 */
class RegisterUserController extends Controller
{
    /**
     * register action
     *
     * @param Request $request
     * @return array
     */
    public function register(UserRegistartion $request){

    //    Mail::to('b1a98f7538-5964da@inbox.mailtrap.io')->send(new RegistartionConfirmationEmail());

    //    die;

        $failValidatedFields = $request->failed();

        if(empty($failValidatedFields)){

            $user = new User();
            $user->login = $request->input('login');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'), [
                'rounds' => 12,
            ]);
            $result = $user->save();

            return $this->sendResponse($result, 'User Registered', 201);
        }else{
            return $this->sendError('User Registration Fields Failed Validation', 200, $failValidatedFields);
        }
    }

}
