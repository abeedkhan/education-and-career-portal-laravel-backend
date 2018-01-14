<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarsionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varsions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('medium_id');
            $table->timestamps();

//            $table->foreign('medium_id')->references('id')->on('mediums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('varsions');
    }
}
