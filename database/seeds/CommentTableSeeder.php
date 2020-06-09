<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            DB::table('comments')->insert([
                'description' => Str::random(10),
                'name_user' => Str::random(10),
                'id_product' => rand(1, 100),
                'roleUser' => 'user',
                'vote' => 'Tốt',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}

