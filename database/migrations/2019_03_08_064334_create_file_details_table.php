<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->integer('language_id');
            $table->string('display_name');
            $table->string('short_description');
            $table->string('long_description');
            $table->integer('width');
            $table->integer('height');
            $table->integer('length');
            $table->integer('pages');
            $table->integer('size');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_details');
    }
}
