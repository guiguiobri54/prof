<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('subject')->nullable();
            $table->string('school')->nullable();
            $table->timestamps();
            $table->string('creator');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')

                ->references('id')

                ->on('users')

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
        Schema::drop('classrooms');
    }
}
