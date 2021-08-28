<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::create([
            'user_id'=>'1',
            'statu_id'=>'1'
        ]);

        Order::create([
            'user_id'=>'2',
            'statu_id'=>'2'
        ]);

        Order::create([
            'user_id'=>'3',
            'statu_id'=>'3'
        ]);

        Order::create([
            'user_id'=>'4',
            'statu_id'=>'4'
        ]);

    }
}
