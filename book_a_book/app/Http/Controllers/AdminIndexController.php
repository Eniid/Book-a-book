<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\Book;
use App\Models\Order;

class AdminIndexController extends Controller
{

    public $search;

    public function read(){

        $blocs = Bloc::all();
        $books = Book::has('orders')->with('orders', 'orders.user', 'orders.statu')->get();

        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();
        $orderd = Order::where('statu_id', '=', '2')->count();
        $payed = Order::where('statu_id', '=', '3')->count();
        $finished = Order::where('statu_id', '=', '5')->count();


        //dd($books);

        return view('admin.index', compact('blocs', 'books', 'inProcess', 'orderd', 'payed', 'finished' ));
    }

}
