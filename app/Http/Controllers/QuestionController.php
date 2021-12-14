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
    public function getAll(Request $request){
        $question = new Question();

        return $question->getAll($request);
    }

    /**
     * edit question-answer
     *
     * @param Request $request
     * @return bool
     */
    public function edit(Request $request){

        $question = Question::find($request->id);

        if($request->question == null){
            $request->question = '';
        }
        if($request->answer == null){
            $request->answer = '';
        }

        $result = $question->edit($request->question, $request->answer);

        if($result){
            $responseData = [
                "data" => [
                    "message" => "Question was updated."
                ]
            ];
            return response() -> json($responseData, 200);
        }else{
            $responseData = [
                "error" => [
                    "message" => "Question was not updated"
                ]
            ];
            return response() -> json($responseData,400);
        }



        return $result;
    }

}
