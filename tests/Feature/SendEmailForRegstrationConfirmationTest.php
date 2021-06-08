<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use function PHPUnit\Framework\assertFalse;

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
}
