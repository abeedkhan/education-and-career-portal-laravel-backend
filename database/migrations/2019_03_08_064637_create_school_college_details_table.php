<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCollegeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_college_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_college_id');
            $table->integer('language_id');
            $table->string('name');
            $table->string('detail');
            $table->string('quality');
            $table->string('study');
            $table->timestamps();
//
//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('school_college_id')->references('id')->on('school_colleges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_college_details');
    }
}
