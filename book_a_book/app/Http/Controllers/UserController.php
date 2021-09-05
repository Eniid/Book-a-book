<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;


use Image;


class UserController extends Controller
{



    public function index(Request $request){
        $blocs = Bloc::has('books')->with('books')->get();
        $bloc_id = request('bloc')??1;
        $bloc = $blocs->where('id', $bloc_id)->first();

        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();


        //$order = Order::where('user_id', Auth::user()->id)->where('archived', 0)->with('books')->first();

        $order = Order::where('user_id', Auth::user()->id)->where('archived', 0)->with('books')->with('statu')->first();


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


        return view('profil.student', compact('blocs', 'bloc', 'bloc_id', 'order', 'booksOrder', 'inProcess'));
    }




    public function adminp(Request $request){
        $blocs = Bloc::has('books')->with('books')->get();
        $bloc_id = request('bloc')??1;
        $bloc = $blocs->where('id', $bloc_id)->first();

        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();

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


        return view('profil.admin', compact('blocs', 'bloc', 'bloc_id', 'order', 'booksOrder', 'inProcess'));
    }








    public function update(Request $request){

        $validations = [];

        if($request->name){
            $validations['name']='min:4|max:200';
        }
        if($request->file('pp') && $request->file('pp')->isValid()){
            $validations['pp']='mimes:jpg,jpeg,png,gif|file|max:5120';
        }
        if($request->mail){
            $validations['email']='min:4|max:200';
        }
        if($request->group){
            $validations['group']='min:4|max:4';
        }
        if($request->password){
            $validations['password']='min:4|confirmed';
        }

        if($request->be){
            $validations['be']='min:9';
        }

        if($request->dispo){
            $validations['dispo']='min:4';
        }

        if($request->file('profil') && $request->file('profil')->isValid()){
            $validations['profil']='mimes:jpg,jpeg,png,gif|file|max:1120';
        }


        $user =  $request->validate(
            $validations
        );

        if($request->name){
            Auth::user() -> name = request('name');
        }

        if($request->mail){
            Auth::user() -> email = request('mail');
        }

        if($request->group){
            Auth::user() -> group = request('group');
        }

        if($request->password){
            Auth::user() -> password = Hash::make(request('password'));
        }

        if($request->file('profil') && $request->file('profil')->isValid()){

            // $fileName = urlencode($request->profil->getClientOriginalName());
            // $fileNameFull = time() . '-' . $fileName;
            // $path = 'img/profil/' . $fileNameFull;
            // $request->profil->move('img/profil', $fileNameFull);


            // Auth::user() -> img = $path;

            $img = Image::make($request->profil)->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
             });
             $imgPath = 'img/profil' . time() . '-' . urlencode($request->profil->getClientOriginalName());
             $img->save($imgPath, 70);


             Auth::user()  -> img = $imgPath;



        }

        if($request->be){
            Auth::user() -> be = request('be');
        }

        if($request->dispo){
            Auth::user() -> visit_time = request('dispo');
        }

        Auth::user() -> save();




        return redirect('/profil');



    }


}
