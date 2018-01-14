<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarsionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varsion_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('version_id');
            $table->integer('language_id');
            $table->string('version_name');
            $table->string('version_detail');
            $table->timestamps();

//            $table->foreign('version_id')->references('id')->on('versions');
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
        Schema::dropIfExists('varsion_details');
    }
}
