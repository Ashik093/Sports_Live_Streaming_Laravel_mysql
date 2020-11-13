<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('team_one');
            $table->string('team_two');
            $table->string('team_one_image');
            $table->string('team_two_image');
            $table->string('time');
            $table->string('date');
            $table->string('channel_name');
            $table->string('channel_link');
            $table->string('status');
            $table->text('description')->nullable();
            $table->string('score')->nullable();
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
        Schema::dropIfExists('matchs');
    }
}
