<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacaltyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facalty_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('facalty_id');
            $table->integer('language_id');
            $table->string('facalty_name');
            $table->string('facalty_detail');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('facalty_id')->references('id')->on('facalties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facalty_details');
    }
}
