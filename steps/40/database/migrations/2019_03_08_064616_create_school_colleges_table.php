<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_colleges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id');
            $table->integer('institute_type_id');
            $table->integer('district_id');
            $table->integer('type_id');
            $table->integer('division_id');
            $table->integer('version_id');
            $table->integer('medium_id');
            $table->integer('number_of_teacher');
            $table->integer('number_of_student');
            $table->integer('number_of_professor');
            $table->integer('number_of_assistance_professor');
            $table->integer('number_of_lecturer');
            $table->string('location');
            $table->timestamps();


//            $table->foreign('item_id')->references('id')->on('items');
//            $table->foreign('institute_type_id')->references('id')->on('institute_types');
//            $table->foreign('district_id')->references('id')->on('districts');
//            $table->foreign('type_id')->references('id')->on('types');
//            $table->foreign('division_id')->references('id')->on('divisions');
//            $table->foreign('version_id')->references('id')->on('versions');
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
        Schema::dropIfExists('school_colleges');
    }
}
