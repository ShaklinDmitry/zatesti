<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Create new question
     * @param Request $request
     */
    public function create(Request $request){
        $question = new Question();
        $question->create($request);
    }

    /**
     * Get List of questions
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        $question = new Question();

        return $question->getAll();
    }

    /**
     * edit question-answer
     *
     * @param Request $request
     * @return bool
     */
    public function edit(Request $request){

        $question = new Question($request->id, $request->question, $request->answer);

        $result = $question->edit();

        return $result;
    }

}
