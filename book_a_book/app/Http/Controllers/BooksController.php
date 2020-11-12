<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function read(){
        $books = Book::all();
        $blocs = Bloc::all();

        return view('admin.books', compact('books', 'blocs'));
    }


}
