<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 250) as $index) {
            DB::table('cars')->insert([
                'user_id' => rand(1, 150),
                'license_plate' => strtoupper(Str::random(6)),
                'make' => $faker->company,
                'model' => $faker->word,
                'price' => $faker->randomFloat(2, 5000, 50000),
                'mileage' => $faker->numberBetween(10000, 200000),
                'seats' => $faker->numberBetween(2, 7),
                'doors' => $faker->numberBetween(2, 5),
                'production_year' => $faker->numberBetween(1995, 2023),
                'weight' => $faker->randomFloat(2, 800, 3000),
                'color' => $faker->safeColorName,
                'image' => null,
                'sold_at' => rand(0, 1) ? now() : null,
                'views' => $faker->numberBetween(0, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }    }
}
