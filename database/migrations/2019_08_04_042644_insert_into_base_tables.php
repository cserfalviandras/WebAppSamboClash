<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertIntoBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Statuses
        DB::table('statuses')->insert(
            array(
                'name' => 'Nincs elkezdve'
            )
        );

        DB::table('statuses')->insert(
            array(
                'name' => 'Folyamatban'
            )
        );

        DB::table('statuses')->insert(
            array(
                'name' => 'Befejeződött'
            )
        );

        // Dresses
        DB::table('dresses')->insert(
            array(
                'name' => 'Piros'
            )
        );
        
        DB::table('dresses')->insert(
            array(
                'name' => 'Kék'
            )
        );

        // Age groups
        DB::table('age_groups')->insert(
            array(
                'name' => 'Fiatal gyerekek',
                'male_age_min' => '11',
                'male_age_max' => '12',
                'female_age_min' => '11',
                'female_age_max' => '12',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Iskolás gyerekek',
                'male_age_min' => '13',
                'male_age_max' => '14',
                'female_age_min' => '13',
                'female_age_max' => '14',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Kadett',
                'male_age_min' => '15',
                'male_age_max' => '16',
                'female_age_min' => '15',
                'female_age_max' => '16',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Junior',
                'male_age_min' => '17',
                'male_age_max' => '18',
                'female_age_min' => '17',
                'female_age_max' => '18',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Ifjúsági',
                'male_age_min' => '19',
                'male_age_max' => '20',
                'female_age_min' => '19',
                'female_age_max' => '20',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Felnőtt',
                'male_age_min' => '19',
                'male_age_max' => '99',
                'female_age_min' => '19',
                'female_age_max' => '99',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Veterán/Masters 35',
                'male_age_min' => '35',
                'male_age_max' => '39',
                'female_age_min' => '35',
                'female_age_max' => '39',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Veterán/Masters 40',
                'male_age_min' => '40',
                'male_age_max' => '44',
                'female_age_min' => '40',
                'female_age_max' => '44',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Veterán/Masters 45',
                'male_age_min' => '45',
                'male_age_max' => '49',
                'female_age_min' => '45',
                'female_age_max' => '49',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Veterán/Masters 50',
                'male_age_min' => '50',
                'male_age_max' => '54',
                'female_age_min' => '50',
                'female_age_max' => '54',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Veterán/Masters 55',
                'male_age_min' => '55',
                'male_age_max' => '59',
                'female_age_min' => '50',
                'female_age_max' => '59',
            )
        );

        DB::table('age_groups')->insert(
            array(
                'name' => 'Veterán/Masters 60',
                'male_age_min' => '60',
                'male_age_max' => '99',
                'female_age_min' => '60',
                'female_age_max' => '99',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('statuses')->truncate();
        DB::table('dresses')->truncate();
        DB::table('age_groups')->truncate();
    }
}
