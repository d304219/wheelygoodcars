<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {

        
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '0612345678',
            'is_admin' => true,
        ]);

        $faker = Faker::create();
        
        foreach (range(1, 149) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone_number' => $faker->phoneNumber,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
