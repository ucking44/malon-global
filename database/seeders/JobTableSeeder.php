<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobType;
use App\Models\Category;
use App\Models\WorkCondition;
use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    ///protected $model = Job::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Job::insert([
            'job_name' => 'Software company',
            'category_id' => Category::all()->random()->id,
            'jobType_id' => JobType::all()->random()->id,
            'workCondition_id' => WorkCondition::all()->random()->id,
        ]);

    }
}

