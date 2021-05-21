<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterUserTest extends TestCase
{
    /**
     * Тест на регистрацию пользователя
     *
     * @return void
     */
    public function testRegisterUser()
    {
        $login = 'test_login';
        $password = 'test_password';

        $response = $this->post('/api/register', array(
            'login' => $login,
            'password' => $password
        ));

        $userModel = new User();
        $user = $userModel->getUserByLogin($login);

        $this->assertEquals($login, $user->login);
    }
}
