<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CarTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (range(1, 250) as $car_id) {
            $tagCount = rand(1, 5);
            $tags = range(1, 20);
            shuffle($tags);
            
            foreach (array_slice($tags, 0, $tagCount) as $tag_id) {
                DB::table('car_tag')->insert([
                    'car_id' => $car_id,
                    'tag_id' => $tag_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                }
            }
        }
    }