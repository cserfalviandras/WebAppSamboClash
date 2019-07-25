<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSqueezeTimingHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squeeze_timing_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clash_id');
            $table->unsignedBigInteger('comp_id');
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
        Schema::dropIfExists('squeeze_timing_heads');
    }
}
