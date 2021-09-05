<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\BlocBooks;
use App\Models\Book;
use App\Models\Order;
use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Image;


class BooksController extends Controller
{
    public function read(){
        $books = Book::all();
        $blocs = Bloc::all();
        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();
        $orderd = Order::where('statu_id', '=', '2')->count();
        $payed = Order::where('statu_id', '=', '3')->count();
        $finished = Order::where('statu_id', '=', '5')->count();



        return view('admin.books', compact('books', 'blocs', 'inProcess', 'orderd', 'payed', 'finished'));
}



// Mettre a jour un Livre!


    public function edit(Book $book){
        $books = Book::all();

        $book->with('orders');
        $blocs = Bloc::all();
        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();
        $orderd = Order::where('statu_id', '=', '2')->count();
        $payed = Order::where('statu_id', '=', '3')->count();
        $finished = Order::where('statu_id', '=', '5')->count();



    return view('admin.book-edit', compact('books', 'blocs', 'book', 'inProcess', 'orderd', 'payed', 'finished'));
}





    public function update(Request $request, Book $book){


        // $blocs = Bloc::all();
        $book = Book::where('id', request('book_id'))->first();

        //$Book->id = $request->book_id;
        $validations = [];


        if($request->title){
            $validations['title']='min:4|max:40';
        }

        if($request->auth){
            $validations['auth']='min:4|max:20';
        }

        if($request->img){
            $validations['img']='request';
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



        $book -> stock = request('stock') ?? 0 ;


        if(request('img')){
            $fileName = urlencode($request->img->getClientOriginalName());
            $fileNameFull = time() . '-' . $fileName;
            $path = 'img/cover/' . $fileNameFull;
            $request->img->move('img/cover', $fileNameFull);

            $book -> img = $path;
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


        if(request('requ')){
            $book->required = 1;
        } else {
            $book->required = 0;
        }

        $book ->save();


        return redirect('/admin/books');;
    }



    public function create(){
        $books = Book::all();
        $blocs = Bloc::all();
        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();
        $orderd = Order::where('statu_id', '=', '2')->count();
        $payed = Order::where('statu_id', '=', '3')->count();
        $finished = Order::where('statu_id', '=', '5')->count();



        return view('admin.book-create', compact('books', 'blocs', 'inProcess', 'orderd', 'payed', 'finished'));
    }

    // Crer un livre !!! :D


    public function store(Request $request){


        $book = new Book(request()->validate(
            [
                'img' => 'required',
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


        // $fileName = urlencode($request->img->getClientOriginalName());
        // $fileNameFull = time() . '-' . $fileName;
        // $path = 'img/cover/' . $fileNameFull;
        // $request->img->move('img/cover', $fileNameFull);



        $img = Image::make($request->img)->resize(null, 250, function ($constraint) {
            $constraint->aspectRatio();
         });
         $imgPath = 'img/cover' . time() . '-' . urlencode($request->img->getClientOriginalName());
         $img->save($imgPath, 70);



        $book -> img = $imgPath;

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




    public function del(Request $request){


        $bookRelDel = BookOrder::where('book_id', request('del_id'));
        $bookRelDel->delete();

        $bookDel = Book::where('id', request('del_id'));
        $bookDel->delete();

        return redirect('/admin/books');
    }





    public function stock(Request $request){



        $book = Book::where('id', request('book_id'))->first();

        if($request->stock){
            $validations['stock']='min:0';
        }

        //dd($book);

        $book -> stock = request('stock') ?? 0 ;
        $book ->save();


        return redirect('/admin/stock');;
    }







}
