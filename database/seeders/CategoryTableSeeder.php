<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        //$password = Hash::make('password');

        Category::create([
            'name' => 'Tech',
            'description' => 'Tech department',
        ]);

        Category::create([
            'name' => 'Health Care',
            'description' => 'Health care department',
        ]);

        Category::create([
            'name' => 'Hospitality',
            'description' => 'Hospitality department',
        ]);

        Category::create([
            'name' => 'Customer Service',
            'description' => 'Customer Service department',
        ]);

        Category::create([
            'name' => 'Marketing',
            'description' => 'Marketing department',
        ]);
    }
}
