<?php

namespace App\Http\Livewire;

use App\Models\Bloc;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBooks extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $byBloc = null;


    public function render()
    {

        $books = Book::all();
        $blocs = Bloc::all();


        return view('livewire.admin-books', [
            'blocs' => Bloc::all(),
            'books' => Book::when($this->byBloc, function($query){
                $query->where('bloc_id', $this->byBloc);
            })
            ->where('title', 'like', '%'.$this->search.'%')
            ->paginate(10),
        ]);


    }
}
