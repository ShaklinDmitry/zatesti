<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MailingInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('mailing_information')->insert([
                                                   'name' => "REGISTRATION_CONFIRMATION",
                                                   'from' => 'zatesti@gmail.com',
                                                 ]);
    }
}
