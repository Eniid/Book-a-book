<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Statu;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $byStat = null;


    public function render()
    {

        $students = User::when($this->byStat, function($query){
            $query->where($order->status_id, $this->byStat);
        })
        ->where('name', 'like', '%'.$this->search.'%')
        ->orWhere('group', 'like', '%'.$this->search.'%')
        ->with('orders', 'orders.statu', 'orders.books')
        // ->with(['orders.books' => function($query) {
        //     $query->distinct();
        // }])
        ->paginate(8);

        foreach($students as $student){
            foreach($student->orders as $order){
                    $order->quantities = $order->books->countBy(function ($item) {
                        return $item->id;
                    });


                //$order->books->unique('id');
            }
        }



        return view('livewire.students', [
            'students' => $students,
            'orders' => Order::with('books')->paginate(30),
            'status' => Statu::all()
        ]);
    }
}

