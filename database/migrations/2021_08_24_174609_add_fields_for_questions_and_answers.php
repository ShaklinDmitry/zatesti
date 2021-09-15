<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsForQuestionsAndAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->string('question')->default('');
            $table->string('answer_1')->default('');
            $table->string('answer_2')->default('');
            $table->string('answer_3')->default('');
            $table->string('answer_4')->default('');
            $table->integer('correct_answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('question');
            $table->dropColumn('answer_1');
            $table->dropColumn('answer_2');
            $table->dropColumn('answer_3');
            $table->dropColumn('answer_4');
            $table->dropColumn('correct_answer');
        });
    }
}
