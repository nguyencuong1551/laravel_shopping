<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            DB::table('bills')->insert([
                'name' => Str::random(10),
                'phone' => rand(1, 10),
                'address' => Str::random(10),
                'email' => 'nguyencuong1551070711@gmail.com',
                'payment' => 'Thanh toán khi nhận hàng',
                'nameSP' => Str::random(10),
                'promotion_price' => '1000',
                'quantity' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),


            ]);
        }
    }
}

