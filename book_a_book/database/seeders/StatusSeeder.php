<?php

namespace Database\Seeders;

use App\Models\Statu;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statu::create([
            'status'=>'cart',
            'status_display' => 'Dans le panier'
    ]);
        Statu::create([
            'status'=>'ordered',
            'status_display' => 'En attente de payement'

        ]);
        Statu::create([
            'status'=>'payed',
            'status_display' => 'En attente de Stoque'
        ]);
        Statu::create([
            'status'=>'available',
            'status_display' => 'A récupérer'
        ]);
        Statu::create([
            'status'=>'finished',
            'status_display' => 'En ordre']);
    }
}
