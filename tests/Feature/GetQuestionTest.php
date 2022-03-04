<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetQuestionTest extends TestCase
{
    /**
     * testing getting a list of questions
     */
    public function testGetQuestionsWithEmptyBase(){
        $this->artisan('migrate:fresh');

        $response = $this->get('/api/question?offset=0&limit=1');

        $response->assertJson(
            [
                "data" => [
                    "questions" => array()
                ]
            ]
        );
    }

    public function testGetQuestions(){
        $this->artisan('migrate:fresh');

        $question = 'this is test question';

        $response = $this->post('/api/question', array(
            'text' => $question
        ));

        //возможно здесь прописано неправльно
        $response = $this->get('/api/question?offset=0&limit=1');

        $response->assertJson(
            [
                "data" => [
                    "questions" => [
                        array(
                            'text' => 'this is test question',
                        )]
                ]
            ]
        );
    }
}
