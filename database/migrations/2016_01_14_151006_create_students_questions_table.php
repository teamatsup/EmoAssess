<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_questions', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign("user_id")->references('id')
                ->on('users')->onDelete('cascade');
            $table->integer('question_id')->unsigned();
            $table->foreign("question_id")->references('id')
                ->on('questions')->onDelete('cascade');
            $table->primary(['user_id', 'question_id']);
            $table->integer('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_questions');
    }
}
