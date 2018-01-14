<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('division_id');
            $table->integer('language_id');
            $table->string('division_name');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('division_id')->references('id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('division_details');
    }
}
