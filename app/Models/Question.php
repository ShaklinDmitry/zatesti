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

    /**
     * Create new question
     * @param Request $request
     */
    public function create(Request $request){
        $this->text = $request->text;

        $this->save();
    }

    /**
     * Get all questions
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        return $this->all();
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
    public function edit(string $id, string $question, string $answer){
        $question = $this->where('id' , '=' , $id )->get();

        $question->text = $question;
        $question->answer = $answer;

        $result = $question->save();
        return $result;
    }

}
