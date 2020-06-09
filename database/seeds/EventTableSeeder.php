<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            DB::table('events')->insert([
                'nameEvent' => Str::random(10),
                'percent' => rand(50, 100),
                'imageEvent' => Str::random(10),
            ]);
        }
    }
}

