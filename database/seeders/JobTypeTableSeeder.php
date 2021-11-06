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
            'job_type_name' => 'Full-time',
            'JT_description' => 'Full time job',
        ]);

        JobType::create([
            'job_type_name' => 'Temporary',
            'JT_description' => 'Temporary job',
        ]);

        JobType::create([
            'job_type_name' => 'Contract',
            'JT_description' => 'Contract job',
        ]);

        JobType::create([
            'job_type_name' => 'Permanent',
            'JT_description' => 'Permanent job',
        ]);

        JobType::create([
            'job_type_name' => 'Internship',
            'JT_description' => 'Internship job',
        ]);

        JobType::create([
            'job_type_name' => 'Volunteer',
            'JT_description' => 'Volunteer job',
        ]);

    }
}

