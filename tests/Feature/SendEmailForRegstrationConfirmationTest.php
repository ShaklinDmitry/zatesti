<?php

namespace Tests\Feature;

use App\Jobs\SendRegistrationConfrimationEmailToUser;
use App\Layers\Registration\Registration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use function PHPUnit\Framework\assertFalse;
use Illuminate\Support\Facades\Artisan;

class SendEmailForRegstrationConfirmationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserHasMailConfirmationStatus()
    {

        $user = new User();

        if($user->getConnection()->getSchemaBuilder()->hasColumn($user->getTable(), 'is_user_email_confirmed')){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testUserMailConfirmationStatusIsFalseByDefault(){
        $login = 'test_login';
        $email = 'test_email';
        $password = 'test_password';

        $response = $this->post('/api/register', array(
            'login' => $login,
            'email' => $email,
            'password' => $password
        ));

        $userModel = new User();
        $user = $userModel->getUserByLogin($login);

        $this->assertEquals(0, $user->is_user_email_confirmed);

    }

//
//    public function testSendEmailToUser(){
//        $login = 'test_login';
//        $email = 'test_email';
//        $password = 'test_password';
//
//        $request = array(
//            'login' => $login,
//            'email' => $email,
//            'password' => $password
//        );
//
//        $registration = new Registration();
//        $result = $registration->createUser($request);
//
//        $sendEmailJob = new SendRegistrationConfrimationEmailToUser();
//        $sendEmailJob->handle($email);
//
//        $userModel = new User();
//        $user = $userModel->getUserByLogin($login);
//
//        $this->assertEquals(1, $user->is_confirmation_email_sended);
//    }



}
