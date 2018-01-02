<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_type_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('institute_type_id');
            $table->integer('language_id');
            $table->string('institute_type_name');
            $table->string('institute_type_detail');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('institute_type_id')->references('id')->on('institute_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institute_type_details');
    }
}
