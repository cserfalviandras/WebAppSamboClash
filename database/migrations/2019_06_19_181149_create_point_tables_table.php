<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('clash_id');
            $table->unsignedBigInteger('comp_id');
            $table->integer('current_point');
            $table->integer('point_added');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_tables');
    }
}
