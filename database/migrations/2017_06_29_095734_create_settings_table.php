<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('id')->on('setting_groups');
            $table->string('setting_key', 100)->unique()->index();
            $table->text('setting_value');
            $table->enum('setting_type', [
                'button', 'checkbox', 'color', 'date', 'datetime-local', 'email', 'file', 'hidden',
                'image', 'month', 'number', 'password', 'radio', 'range', 'reset', 'search',
                'submit', 'tel', 'text', 'time', 'url', 'week'
            ]);
            $table->text('setting_options')->nullable();
            $table->smallInteger('sort_order')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
