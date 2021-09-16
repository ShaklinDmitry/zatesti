<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Test extends Model
{
  //  use HasFactory;

    protected $guarded = [];

    /**
     * Create new question
     * @param Request $request
     */
    public function create(Request $request){
        $this->name = $request->testName;
        $this->user_id = $request->user_id;

        $this->question = $request->testQuestion;
        $this->answer_1 = $request->testAnswer1;
        $this->answer_2 = $request->testAnswer2;
        $this->answer_3 = $request->testAnswer3;
        $this->answer_4 = $request->testAnswer4;
        $this->correct_answer = $request->correct_answer;

        $this->save();
    }

    /**
     * Get all test questions by user with user_id
     * @param Request $request
     * @return mixed
     */
    public function getTestQuestions(Request $request){
        return $this->select('*')->where([
            ['user_id', '=', $request->user_id]
        ])->all();
    }

}
