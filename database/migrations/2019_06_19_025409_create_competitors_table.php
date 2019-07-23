<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('age_group_id')->nullable();
            $table->unsignedBigInteger('weight_cat_id')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('mother_maiden_name')->nullable();
            $table->unsignedBigInteger('creator_id');
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
        Schema::dropIfExists('competitors');
    }
}
