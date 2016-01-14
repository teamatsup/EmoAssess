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
            $table->integer('student_id')->unsigned();
            $table->foreign("student_id")->references('id')
                ->on('students')->onDelete('cascade');
            $table->integer('question_id')->unsigned();
            $table->foreign("question_id")->references('id')
                ->on('questions')->onDelete('cascade');
            $table->primary(['student_id', 'question_id']);
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
