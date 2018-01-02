<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alumni_id');
            $table->integer('language_id');
            $table->string('alumni_name');
            $table->string('alumni_image');
            $table->string('about');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('alumni_id')->references('id')->on('alumnis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni_details');
    }
}
