<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingInformation extends Model
{
    use HasFactory;

    /**
     * @param $mailingName
     * @return string
     */
    public function getFromWhomEmailAddress($mailingName){
        $mailingInformation = $this->select('*')->where([['name', '=', $mailingName]])->first();
        return $mailingInformation->from;
    }


    /**
     * @param $mailingName
     * @return string
     */
    public function getSubject($mailingName){
        $mailingInformation = $this->select('*')->where([['name', '=', $mailingName]])->first();
        return $mailingInformation->subject;

    }


}
