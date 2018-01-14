<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('district_id');
            $table->integer('language_id');
            $table->string('district_name');
            $table->timestamps();


//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('district_detail_id')->references('id')->on('district_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_details');
    }
}
