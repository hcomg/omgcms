<?php

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
            $table->increments('id');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('real_name')->nullable();
            $table->string('email', 60)->unique();
            $table->string('api_token', 60)->unique();
            $table->tinyInteger('is_activated')->default(1);
            $table->dateTime('activated_at')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('reset_password_code')->nullable();
            $table->char('locale')->default('en');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
