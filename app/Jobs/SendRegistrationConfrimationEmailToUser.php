<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationConfrimationEmailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //    Mail::to('b1a98f7538-7dc730@inbox.mailtrap.io')->send(new \App\Mail\RegistartionConfirmationEmail());
            Mail::to('wee@mail.ru')->send(new \App\Mail\RegistartionConfirmationEmail());


//
//            $userModel = new \App\Models\User();
//            $user = $userModel->getUserByEmail($this->email);
//            if($user){
//                $user->is_confirmation_email_sended = true;
//                $user->save();
//            }
    }
}
