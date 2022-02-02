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
        $result = $question->create($request);

        if($result){
            $response = [
                "data" => [
                    "message" => "Question was created"
                ]
            ];
            return response() -> json($response,201);
        }else{
            $response = [
                "error" => [
                    "message" => "Question not created"
                ]
            ];
            return response() -> json($response,200);
        }
    }

    /**
     * Get List of questions
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(Request $request){
        $question = new Question();

        $questions = $question->get($request);

        $response = [
            "data" => [
                "questions" => $questions
            ]
        ];

        return $response;
    }

    /**
     * edit question-answer
     *
     * @param Request $request
     * @return bool
     */
    public function edit(Request $request){


        //заменить id на questionid
        $question = Question::find($request->id);

        //это если не найдено
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
                    "message" => "Question was updated"
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
