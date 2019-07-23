<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('age_group_id');
            $table->unsignedBigInteger('weight_cat_id');
            $table->unsignedBigInteger('scoreboard_id');
            $table->unsignedBigInteger('winner_id');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->dateTime('real_start_time')->nullable();
            $table->dateTime('real_end_time')->nullable();
            $table->unsignedBigInteger('clash_status_id');
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
        Schema::dropIfExists('clashes');
    }
}
