<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign("student_id")->references('id')
                ->on('students')->onDelete('cascade');
            $table->date('date_taken');
            $table->integer('intra_score');
            $table->integer('inter_score');
            $table->integer('strss_mgt_score');
            $table->integer('adap_score');
            $table->integer('gen_mood_score');
            $table->integer('total_eq');
            $table->integer('pstv_imprssn_score');
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
        Schema::drop('tests');
    }
}
