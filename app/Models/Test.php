<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Test extends Model
{
  //  use HasFactory;

    protected $guarded = [];

    /**
     * @param Request $request
     */
    public function create(Request $request){
        $this->name = $request->name;
        $this->user_id = $request->user_id;

        $this->question = $request->question;
        $this->answer_1 = $request->answer_1;
        $this->answer_2 = $request->answer_2;
        $this->answer_3 = $request->answer_3;
        $this->answer_4 = $request->answer_4;
        $this->correct_answer = $request->correct_answer;

        $this->save();
    }
}
