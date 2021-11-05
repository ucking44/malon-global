<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        JobType::create([
            'name' => 'Full-time',
            'description' => 'Full time job',
        ]);

        JobType::create([
            'name' => 'Temporary',
            'description' => 'Temporary job',
        ]);

        JobType::create([
            'name' => 'Contract',
            'description' => 'Contract job',
        ]);

        JobType::create([
            'name' => 'Permanent',
            'description' => 'Permanent job',
        ]);

        JobType::create([
            'name' => 'Internship',
            'description' => 'Internship job',
        ]);

        JobType::create([
            'name' => 'Volunteer',
            'description' => 'Volunteer job',
        ]);

    }
}

