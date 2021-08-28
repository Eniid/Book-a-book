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
    public $search;

    public function render()
    {
        return view('livewire.students', [
            'students' => User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('group', 'like', '%'.$this->search.'%')
            ->with('orders.statu', 'orders.books' )
            ->paginate(20),
            'orders' => Order::with('books')->paginate(30)
        ]);
    }
}

