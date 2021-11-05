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
            'name' => 'Remote',
            'description' => 'Remote job',
        ]);

        WorkCondition::create([
            'name' => 'Part Remote',
            'description' => 'Part Remote job',
        ]);

        WorkCondition::create([
            'name' => 'On-Premise',
            'description' => 'On-Premise job',
        ]);

    }
}

