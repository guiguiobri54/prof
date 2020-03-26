<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_subscriptions', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_id');
            $table->timestamps();
            $table->text('message')->nullable();;
            $table->integer('classroom_id')->unsigned();
            $table->foreign('classroom_id')

                ->references('id')

                ->on('classrooms')

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
        Schema::drop('classroom_subs');
    }
}
