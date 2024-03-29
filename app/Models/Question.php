<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property $id
 * @property $text
 * @property $answer
 */

class Question extends Model
{
    use HasFactory;

//    protected $connection= 'mysql_test';

    /**
     * Create new question
     * @param Request $request
     * @return bool
     */

    public function create(Request $request){
        $this->text = $request->text;
        $this->answer = '';

        $result = $this->save();
        return $result;
    }

    /**
     * Get questions
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(Request $request){
      //  return $this->all();
        return $this->offset($request->offset)->limit($request->limit)->get();
    }


    /**
     * edit question-answer
     *
     * @param string $id
     * @param string $question
     * @param string $answer
     *
     * @return bool
     */
    public function edit(string $question, string $answer){

        $this->text = $question;
        $this->answer = $answer;

        $result = $this->save();
        return $result;
    }

}
