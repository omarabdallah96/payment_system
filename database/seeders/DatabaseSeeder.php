<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

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
        //create default user
        User::create(
            [
                'name' => 'Test User',
                'email' => 'user@users.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
            ]
        );
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'phone' => '123-456-7890',
                'group' => 2,
            ]
        );
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        foreach (range(1, 200) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
