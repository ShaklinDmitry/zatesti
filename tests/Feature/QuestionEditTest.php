<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionEditTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void{
        parent::setUp();
        $this->refreshDatabase();
    }

    public function testEditQuestion(){
        $question = 'this is test question for edit';

        $response = $this->post('/api/question', array(
            'text' => $question
        ));

        $editResponse = $this->patch('/api/question', array(
            'id' => 0,
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
