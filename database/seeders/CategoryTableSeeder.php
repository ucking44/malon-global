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

        Category::create([
            'category_name' => 'Tech',
            'C_description' => 'Tech department',
        ]);

        Category::create([
            'category_name' => 'Health Care',
            'C_description' => 'Health care department',
        ]);

        Category::create([
            'category_name' => 'Hospitality',
            'C_description' => 'Hospitality department',
        ]);

        Category::create([
            'category_name' => 'Customer Service',
            'C_description' => 'Customer Service department',
        ]);

        Category::create([
            'category_name' => 'Marketing',
            'C_description' => 'Marketing department',
        ]);
    }
}

