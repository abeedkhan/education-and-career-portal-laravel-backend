<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('first_name')->default("abid");
            $table->string('last_name')->default("khan");
            $table->string('gender')->default(User::MALE_USER);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default(User::REGULAR_USER);
            $table->string('admin')->default(User::REGULAR_USER);
            $table->date('date_of_birth')->default('1990-01-01');
            $table->rememberToken();
            $table->timestamps();
            $table->string('image')->default("1.jpg");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
