<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarsitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varsities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id');
            $table->integer('district_id');
            $table->integer('division_id');
            $table->integer('number_of_student');
            $table->integer('number_of_professor');
            $table->integer('number_of_assistance_professor');
            $table->integer('number_of_lecturer');
            $table->string('location');
            $table->timestamps();


//            $table->foreign('item_id')->references('id')->on('items');
//            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('varsities');
    }
}
