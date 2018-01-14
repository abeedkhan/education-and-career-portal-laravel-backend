<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingCenterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_center_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('training_center_id');
            $table->integer('language_id');
            $table->integer('number_of_student');
            $table->integer('number_of_teacher');
            $table->string('training_center_name');
            $table->string('training_center_detail');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('training_center_id')->references('id')->on('training_centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_center_details');
    }
}
