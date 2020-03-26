<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_study', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('classroom_id')->unsigned();
            $table->integer('study_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('study_id')->references('id')->on('studies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classroom_study');
    }
}
