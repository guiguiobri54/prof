<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creation Etablissement//
        Schema::create('schools', function(Blueprint $table)

        {

            $table->increments('id');

            $table->string('country');

            $table->string('grade');

            $table->string('name', 60 );

            $table->boolean('department');

            $table->string('town',60);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('schools');
    }
}