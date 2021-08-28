<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title'=>'HTML 5',
            'author'=>'Rodolphe Rimelé',
            'edition'=>'Collection Blanche',
            'isbn'=>'tructruc',
            'stock'=>'0',
            'teacher'=>'Madame Dupond',
            'class'=>'HTML th',
            'link'=>'https://www.amazon.fr/HTML-Une-r%C3%A9f%C3%A9rence-pour-d%C3%A9veloppeur/dp/2212136382',
            'school_price'=>15.50,
            'store_price'=>15.00,
            'bloc_id'=> 1,
            ]);


            Book::create([
                'title'=>'HTML 5 - Poket Référance',
                'author'=>'Jennifer Nieder Robbins',
                'edition'=>'Collection Blanche',
                'isbn'=>'tructruc',
                'stock'=>'0',
                'teacher'=>'Madame Dupond',
                'class'=>'HTML th',
                'link'=>'https://www.amazon.fr/HTML-Une-r%C3%A9f%C3%A9rence-pour-d%C3%A9veloppeur/dp/2212136382',
                'school_price'=> 13.50,
                'store_price'=> 14.47,
                'bloc_id'=> 1,

                ]);

                Book::create([
                    'title'=>'Choix Typographique',
                    'author'=>'Xavier Spirlet',
                    'edition'=>'Collection Blanche',
                    'isbn'=>'tructruc',
                    'stock'=>'0',
                    'teacher'=>'Monsieur Spirlet',
                    'class'=>'Typographie et misse en page',
                    'link'=>'https://www.amazon.fr/HTML-Une-r%C3%A9f%C3%A9rence-pour-d%C3%A9veloppeur/dp/2212136382',
                    'school_price'=> 17.50,
                    'store_price'=> 9.00,
                    'bloc_id'=> 2,

                    ]);


                Book::create([
                    'title'=>'CSS poket référance',
                    'author'=>'Truc Much',
                    'edition'=>'Collection Blanche',
                    'isbn'=>'tructruc',
                    'stock'=>'0',
                    'teacher'=>'Monsieur Parmentier',
                    'class'=>'CSS td',
                    'link'=>'https://www.amazon.fr/HTML-Une-r%C3%A9f%C3%A9rence-pour-d%C3%A9veloppeur/dp/2212136382',
                    'school_price'=> 14.50,
                    'store_price'=> 15.00,
                    'required'=>'1',
                    'bloc_id'=> 3,

                    ]);

    }
}
