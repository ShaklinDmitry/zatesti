<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MailInformation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                                     'name' => "REGISTRATION_CONFIRMATION",
                                     'from' => 'zatesti@gmail.com',
                                   ]);
    }
}
