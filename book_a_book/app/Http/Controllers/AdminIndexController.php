<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\Book;

class AdminIndexController extends Controller
{
    public function read(){

        $blocs = Bloc::all();
        $books = Book::has('orders')->with('orders', 'orders.user', 'orders.statu')->get();

        //dd($books);

        return view('admin.index', compact('blocs', 'books'));
    }

}
