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


//    public function testSendEmailToUser(){
//
//        $login = 'test_login_1';
//        $email = 'test_email_1';
//        $password = 'test_password_1';
//
//        $response1 = $this->post('/api/register', array(
//          'login' => $login,
//          'email' => $email,
//          'password' => $password
//        ));
//
//        $sendEmailJob = new SendRegistrationConfrimationEmailToUser($email);
//        $emailJobSendResult = $sendEmailJob->handle();
//
//        $this->assertEquals('Error! Email not sended.', $emailJobSendResult);
////        $userModel = new User();
////        $user = $userModel->getUserByLogin($login);
//
////        $this->assertEquals(1, $user->is_confirmation_email_sended);
//    }

    public function testToWhomEmailAddressIsExist(){
        $login = 'test_login';
        $email = 'test_email@mail.ru';
        $password = 'test_password';

        $response = $this->post('/api/register', array(
          'login' => $login,
          'email' => $email,
          'password' => $password
        ));

        $userModel = new User();
        $user = $userModel->getUserByLogin($login);

        $this->assertEquals($email, $user->email);
    }



}
