<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 20) as $index) {
            DB::table('tags')->insert([
                'name' => ucfirst($faker->word),
                'color' => $faker->hexColor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
