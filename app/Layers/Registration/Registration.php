<?php


namespace App\Layers\Registration;
use App\Layers\Tokens\Token;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->password = Hash::make($request->password, [
            'rounds' => 12,
        ]);
        $user->token = Token::generateToken();
        $result = $user->save();
//
//        if($result){
////            $response = Http::post('http://194.67.110.91:9000/api/notification', [
////                'toWhom' => 'email41'
////            ]);
//
//            $curl = curl_init();
//
//            curl_setopt_array($curl, array(
//                CURLOPT_URL => 'http://194.67.110.91:9000/api/notification',
//                CURLOPT_RETURNTRANSFER => true,
//                CURLOPT_ENCODING => '',
//                CURLOPT_MAXREDIRS => 10,
//                CURLOPT_TIMEOUT => 0,
//                CURLOPT_FOLLOWLOCATION => true,
//                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                CURLOPT_CUSTOMREQUEST => 'POST',
//                CURLOPT_POSTFIELDS =>'{"toWhom": "email41"}',
//                CURLOPT_HTTPHEADER => array(
//                    'Content-Type: application/json'
//                ),
//            ));
//
//            $response = curl_exec($curl);
//
//            curl_close($curl);
//            echo $response;
//
//
//        }


        return [
            'registrationResult' => $result,
            'token' => $user->token
        ];
    }

}
