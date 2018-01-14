<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('content_id');
            $table->integer('language_id');
            $table->string('content_title');
            $table->string('content_description');
            $table->timestamps();

//            $table->foreign('language_id')->references('id')->on('languages');
//            $table->foreign('content_id')->references('id')->on('contents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_details');
    }
}
