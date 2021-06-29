<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingInformation extends Model
{
    use HasFactory;

    /**
     * @param $mailingName
     *
     * @return \App\Models\MailingInformation
     */
    public function getFromWhomEmailAddress($mailingName){
        return $this->select('*')->where([
                                           ['name', '=', $mailingName]
                                         ])->first();
    }

}
