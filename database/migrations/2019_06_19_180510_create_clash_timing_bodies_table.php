<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClashTimingBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clash_timing_bodies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('timing_head_id');
            $table->decimal('start_time', 5, 2);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('clash_timing_bodies');
    }
}
