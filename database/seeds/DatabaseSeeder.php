<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 300; $i++) { 
            $addDays = $i;
            if ($i < 100) {
                DB::table('scores')->insert([
                    'score' => rand(1,10),
                    'created_at' => now()->subDay(4),
                    'updated_at' => now(),
                ]);
            }else if($i >= 100 && $i <= 200){
                DB::table('scores')->insert([
                    'score' => rand(1,10),
                    'created_at' => now()->subDay(3),
                    'updated_at' => now(),
                ]);
            }else if($i >= 201 && $i <= 300){
                DB::table('scores')->insert([
                    'score' => rand(1,10),
                    'created_at' => now()->subDay(2),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
