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

    /**
     * testing getting a list of questions
     */
    public function testGetQuestionsWithEmptyBase(){
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
