<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->unique()->index();
            $table->string('name')->index();
            $table->string('icon')->nullable();
            $table->boolean('is_default')->default(0);
            $table->smallInteger('sort_order')->default(0);
            $table->enum('direction', ['ltr', 'rtl'])->default('ltr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
