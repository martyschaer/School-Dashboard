<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons_teachers', function (Blueprint $table){
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lessons_teachers');
    }
}
