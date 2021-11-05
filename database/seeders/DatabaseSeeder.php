<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(UserTableSeeder::class);
        $this->call(JobTypeTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(WorkConditionTableSeeder::class);
        $this->call(JobTableSeeder::class);

    }
}

