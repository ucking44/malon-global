<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('password');

        User::create([
            'name' => 'Malon Global',
            'email' => 'business@example.com',
            'usertype' => 'admin',
            'password' => $password,
        ]);
    }
}
