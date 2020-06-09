<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'image' => Str::random(10),
                'image1' => Str::random(10),
                'image2' => Str::random(10),
                'image3' => Str::random(10),
                'description' => Str::random(10),
                'unit_price' => '2000',
                'promotion_price' => '1000',
                'id_category' => rand(1, 10),
                'id_event' => rand(1, 10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}

