<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterUserTest extends TestCase
{
 //   use RefreshDatabase;


    /**
     * Тест на регистрацию пользователя
     *
     * @return void
     */
    public function test_success_of_user_registration()
    {
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

        $this->assertEquals($login, $user->login);
    }

    /**
     * Тест на проверку того что пользователь с тем же логином не может зарегестрироваться
     */
    public function test_registration_of_a_user_with_a_duplicate_login_fails(){
        $login1 = 'test_login_1';
        $email1 = 'test_email_1';
        $password1 = 'test_password_1';

        $response1 = $this->post('/api/register', array(
            'login' => $login1,
            'email' => $email1,
            'password' => $password1
        ));

        $login2 = 'test_login_1';
        $email2 = 'test_email_2';
        $password2 = 'test_password_2';

        $response2 = $this->post('/api/register', array(
            'login' => $login2,
            'email' => $email2,
            'password' => $password2
        ));

        $response2->assertJson(
            [
                "error" => [
                    "code" => 422,
                    "message" => ["User with this login already exists."]
                ]
            ]
        );

    }

}
