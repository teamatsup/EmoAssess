<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_number')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('course');
            $table->string('gender', 3);
            $table->integer('age');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->tinyInteger('privilege');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
