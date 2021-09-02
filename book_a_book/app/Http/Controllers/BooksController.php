<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\BlocBooks;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function read(){
        $books = Book::all();
        $blocs = Bloc::all();

        return view('admin.books', compact('books', 'blocs'));
    }



// Mettre a jour un Livre!

    public function update(Request $request, Book $book){

        $blocs = Bloc::all();
        //$book = Book::where('id', request('book_id'));

        $validations = [];


        if($request->title){
            $validations['title']='min:4|max:40';
        }

        if($request->auth){
            $validations['auth']='min:4|max:20';
        }

        if($request->edition){
            $validations['edition']='min:4|max:20';
        }

        if($request->isbn){
            $validations['isbn']='min:4|max:20';
        }

        if($request->prof){
            $validations['prof']='min:4|max:20';
        }

        if(request('title')){
            $book -> title = request('title');
        };
        if(request('auth')){
            $book -> author = request('auth');
        };
        if(request('edition')){
            $book -> edition = request('edition');
        };
        if(request('isbn')){
            $book -> isbn = request('isbn');
        };
        if(request('stock')){
            $book -> stock = request('stock');
        };

        if(request('prof')){
            $book -> teacher = request('prof');
        };
        if(request('class')){
            $book -> class = request('class');
        };

        if(request('link')){
            $book -> link = request('link');
        };

        if(request('school_price')){
            $book -> school_price = request('school_price');
        };

        if(request('store_price')){
            $book -> store_price = request('store_price');
        };

        if(request('bloc')){
            $book -> bloc_id = request('bloc');
        };

        // $book -> required = 1;

        $book ->save();

        return view('admin.book-edit', compact('book', 'blocs'));
    }



    public function create(){
        $books = Book::all();
        $blocs = Bloc::all();


        return view('admin.book-create', compact('books', 'blocs'));
    }

    // Crer un livre !!! :D


    public function store(Request $request){


        $book = new Book(request()->validate(
            [
                'title' => 'required|min:4',
                'auth' => 'required|min:4',
                'edition' => 'required|min:4',
                'isbn' => 'required|min:4',
                'stock' => 'required',
                'prof' => 'required',
                'class' => 'required',
                'link' => 'required',
                'school_price' => 'required',
                'store_price' => 'required',
            ]
        )

        );

        $book -> title = request('title');
        $book -> author = request('auth');
        $book -> edition = request('edition');
        $book -> isbn = request('isbn');
        $book -> stock = request('stock');
        $book -> teacher = request('prof');
        $book -> class = request('class');
        $book -> link = request('link');
        $book -> school_price = request('school_price');
        $book -> store_price = request('store_price');
        $book -> bloc_id = request('bloc');
        $book -> required = 1;
        $book -> save();




        return redirect('/admin/books');;
    }




    public function del(Request $request, Book $book){



        $bookDel = Book::where('id', request('del_id'));
        $bookDel->delete();


        return redirect('/admin/books');
    }


}
