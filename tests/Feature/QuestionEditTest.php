<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionEditTest extends TestCase
{

    public function testEditQuestion(){
        $this->artisan('migrate:fresh');

        $question = 'this is test question for edit';

        $response = $this->post('/api/question', array(
            'text' => $question
        ));


        $editResponse = $this->patch('/api/question', array(
            'id' => 1,
            'question' => 'this is edited question',
            'answer' => 'this is answer'
        ));

        $editResponse->assertJson(
            [
                "data" => [
                    "message" => "Question was updated"
                ]
            ]
        );


    }

}
