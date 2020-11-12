<?php

namespace Database\Seeders;

use App\Models\Bloc;
use Illuminate\Database\Seeder;

class BlocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bloc::create(['bloc'=>'Bloc 1']); 
        Bloc::create(['bloc'=>'Bloc 2 - Web']); 
        Bloc::create(['bloc'=>'Bloc 2 - Design Graphique']); 
        Bloc::create(['bloc'=>'Bloc 2 - 3D']); 
        Bloc::create(['bloc'=>'Bloc 3 - Web']); 
        Bloc::create(['bloc'=>'Bloc 3 - Design Graphique']); 
        Bloc::create(['bloc'=>'Bloc 3 - 3D']); 
    }
}
