<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test create question
     */
    public function testCreateQuestion(){
        $question = 'this is test question1';
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
