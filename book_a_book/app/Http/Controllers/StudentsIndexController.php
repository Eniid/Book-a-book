<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class StudentsIndexController extends Controller
{
    //


    public function read(){
        $books = Book::all();
        
        return view('student.index', compact('books'));
    }

}
