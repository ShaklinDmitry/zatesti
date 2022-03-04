<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateQuestionTest extends TestCase
{
    /**
     * test create question
     */
    public function testCreateQuestion(){
        $this->artisan('migrate:fresh');

        $question = 'this is test question';
        $answer = '';

        $response = $this->post('/api/question', array(
            'text' => $question,
            'answer' => $answer
        ));

        $response->assertJson(
            [
                "data" => [
                    "message" => "Question was created"
                ]
            ]
        );
    }
}
