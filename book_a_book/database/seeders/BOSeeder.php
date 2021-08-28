<?php

namespace Database\Seeders;

use App\Models\BookOrder;
use Illuminate\Database\Seeder;

class BOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookOrder::create([
            'book_id'=>'1',
            'order_id'=>'1'
        ]);
        BookOrder::create([
            'book_id'=>'2',
            'order_id'=>'1'
        ]);
        BookOrder::create([
            'book_id'=>'3',
            'order_id'=>'1'
        ]);


        BookOrder::create([
            'book_id'=>'3',
            'order_id'=>'2'
        ]);

        BookOrder::create([
            'book_id'=>'1',
            'order_id'=>'3'
        ]);

        BookOrder::create([
            'book_id'=>'1',
            'order_id'=>'4'
        ]);
        BookOrder::create([
            'book_id'=>'2',
            'order_id'=>'4'
        ]);





    }
}
