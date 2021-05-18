<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use function PHPUnit\Framework\isEmpty;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testGetRegistrationData(){
        $data = [
            'login' => 'testLogin',
            'email' => 'testEmail',
            'password' => 'testPassword'
        ];

        $response = $this->json('POST', '/api/register', $data);

        $response->assertJson(['message' => "Registration data is received."]);
    }


}
