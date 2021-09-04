<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\Book;
use App\Models\User;
use App\Models\BookOrder;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Mail\OrderMade;



class StudentsIndexController extends Controller
{
    //


    public function index(Request $request){
        $blocs = Bloc::has('books')->with('books')->get();
        $bloc_id = request('bloc')??1;
        $bloc = $blocs->where('id', $bloc_id)->first();

        //$order = Order::where('user_id', Auth::user()->id)->where('archived', 0)->with('books')->first();
        $order = Order::where('user_id', Auth::user()->id)->with([
            'books' => function ($q) {
                $q->groupBy('books.id');
            },
        ])->first();


        $booksOrder = false;

        if($order){
            $booksOrder = BookOrder::where('order_id', $order->id)->get();

            $order->total = 0;

            foreach($order->books as $book) {
                $book->quantity =$booksOrder->where('book_id', $book->id)->count();
                $book->totalPrice = $book->quantity * $book-> school_price;
                $order->total += $book->totalPrice;
            }
        }




        return view('student.index', compact('blocs', 'bloc', 'bloc_id', 'order', 'booksOrder'));
    }


    public function plus(Request $request){

        $curent_user_id = Auth::user()->id;
        $bloc_id = request('bloc')??1;
        $order = Order::where('user_id', $curent_user_id)->first();


        if(!$order){
        $order = new Order();
        $order -> user_id = $curent_user_id;
        $order -> statu_id = 1;
        $order -> archived = 0;


        $book = Book::where('id', request('book_id'))->first();
        $book->orders()->save($order);

        };

        $this_order_id  = $order->id;

        $new_item = new BookOrder();
        $new_item -> order_id = $this_order_id;
        $new_item -> book_id = request('book_id');
        $new_item -> save();


        return redirect('/?bloc='.$bloc_id );
    }


    public function moins(Request $request){

        $bloc_id = request('bloc')??1;

        $curent_user_id = Auth::user()->id;
        $order = Order::where('user_id', $curent_user_id)->first();


        if($order){
            BookOrder::where('order_id', $order->id)->where('book_id', request('book_id'))->take(1)->delete();
        }

        return redirect('/?bloc='.$bloc_id);
    }



    public function view(Request $request){
        $blocs = Bloc::has('books')->with('books')->get();
        $bloc_id = request('bloc')??1;
        $bloc = $blocs->where('id', $bloc_id)->first();

        $order = Order::where('user_id', Auth::user()->id)->where('archived', 0)->with('books')->first();



        $booksOrder = false;
        if($order){
            $booksOrder = BookOrder::where('order_id', $order->id)->get();
        }


        $order->total = 0;

        foreach($order->books as $book) {
            $book->quantity =$booksOrder->where('book_id', $book->id)->count();
            $book->totalPrice = $book->quantity * $book-> school_price;
            $order->total += $book->totalPrice;
        }





        return view('student.cart', compact('blocs', 'bloc', 'bloc_id', 'order', 'booksOrder'));
    }







    public function del(Request $request){

        $bloc_id = request('bloc')??1;

        $curent_user_id = Auth::user()->id;
        $order = Order::where('user_id', $curent_user_id)->first();


        if($order){
            BookOrder::where('order_id', $order->id)->where('book_id', request('book_id'))->take(1)->delete();
        }

        return redirect('/commande');
    }



    public function valid(Request $request){

        $curent_user_id = Auth::user()->id;
        $order = Order::where('user_id', $curent_user_id)->first();


        $admin = User::where('is_admin', '1')->first();
        Mail::to($admin->email)->send(new OrderMade());


        $order->statu_id = 2;
        $order->save();

        return redirect('/commande-en-cours');
    }



    public function commande(Request $request){

        $blocs = Bloc::has('books')->with('books')->get();
        $bloc_id = request('bloc')??1;
        $bloc = $blocs->where('id', $bloc_id)->first();
        $admin = User::where('is_admin', '1')->first();

        $order = Order::where('user_id', Auth::user()->id)->where('archived', 0)->with('books')->with('statu')->first();

        $booksOrder = false;
        if($order){
            $booksOrder = BookOrder::where('order_id', $order->id)->get();
        }


        $order->total = 0;

        foreach($order->books as $book) {
            $book->quantity =$booksOrder->where('book_id', $book->id)->count();
            $book->totalPrice = $book->quantity * $book-> school_price;
            $order->total += $book->totalPrice;
        }



        return view('student.order_stat', compact('order', 'admin', 'blocs', 'bloc_id', 'booksOrder'));
    }




}
