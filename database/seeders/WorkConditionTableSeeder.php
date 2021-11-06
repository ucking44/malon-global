<?php

namespace Database\Seeders;

use App\Models\WorkCondition;
use Illuminate\Database\Seeder;

class WorkConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        WorkCondition::create([
            'work_conditions_name' => 'Remote',
            'WC_description' => 'Remote job',
        ]);

        WorkCondition::create([
            'work_conditions_name' => 'Part Remote',
            'WC_description' => 'Part Remote job',
        ]);

        WorkCondition::create([
            'work_conditions_name' => 'On-Premise',
            'WC_description' => 'On-Premise job',
        ]);

    }
}

