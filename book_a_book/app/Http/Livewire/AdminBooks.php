<?php

namespace App\Http\Livewire;

use App\Models\Bloc;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBooks extends Component
{
    use WithPagination; 

    public $search; 

    public function render()
    { 

        $books = Book::all();
        $blocs = Bloc::all();


        return view('livewire.admin-books', [
            'blocs' => Bloc::all(), 
            'books' => Book::where('title', 'like', '%'.$this->search.'%')
            ->paginate(10),
        ]);


    }
}
