<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_type_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_type_id');
            $table->integer('language_id');
            $table->string('file_type_name');
            $table->string('file_type_description');
            $table->timestamps();


//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('file_type_id')->references('id')->on('file_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_type_details');
    }
}
