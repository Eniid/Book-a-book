<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bloc;
use App\Models\Book;
use App\Models\Order;
use Livewire\WithPagination;


class Dashboard extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $byBloc = null;



    public function render()
    {

        $books = Book::has('orders')->with('orders', 'orders.user', 'orders.statu')->get();
        $blocs = Bloc::all();


        return view('livewire.dashboard', [
            'blocs' => Bloc::all(),
            'books' => Book::when($this->byBloc, function($query){
                $query->where('bloc_id', $this->byBloc);
            })
            ->where('title', 'like', '%'.$this->search.'%')
            ->withCount('orders')
            ->paginate(2),
        ]);



    }
}
