<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarsityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varsity_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('varsity_id');
            $table->integer('language_id');
            $table->string('varsity_name');
            $table->string('study');
            $table->string('quality');
            $table->string('detail');
            $table->string('campus_life');
            $table->string('backround_and_history');
            $table->string('achievements');
            $table->timestamps();

//            $table->foreign('varsity_id')->references('id')->on('varsities');
//            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('varsity_details');
    }
}
