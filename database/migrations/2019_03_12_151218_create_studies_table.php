<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema:: create('studies', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
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
        Schema::drop('studies');
    }
}
