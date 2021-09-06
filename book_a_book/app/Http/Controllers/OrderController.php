<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\Mail;

use App\Mail\OrderPayed;
use App\Mail\OrderAvalible;
use App\Mail\OrderFinished;




class OrderController extends Controller
{



    public function payed(Request $request){

        $order = Order::where('user_id', request('user_id'))->first();
        $user = User::where('id', request('user_id'))->first();


        // Envoyer un E-Mail a l'étudiant pour l'informer du changement de statu de la commande

        Mail::to($user->email)->send(new OrderPayed($user));

        $order->statu_id = 3;
        $order->save();


        return redirect('/admin');;
    }

    public function abalible(Request $request){

        $order = Order::where('user_id', request('user_id'))->with('books')->first();
        $user = User::where('id', request('user_id'))->first();
        $admin = User::where('is_admin', 1)->first();

        Mail::to($user->email)->send(new OrderAvalible($user, $admin));


        //dd($order);
        foreach($order->books as $book){
            $book->stock = $book->stock - 1;
            $book->save();
        }


        $order->statu_id = $order->statu_id + 1;
        $order->save();


        return redirect('/admin');;
    }

    public function finished(Request $request){

        $order = Order::where('user_id', request('user_id'))->first();
        $user = User::where('id', request('user_id'))->first();
        $admin = User::where('is_admin', 1)->first();


        Mail::to($user->email)->send(new OrderFinished($user, $admin));


        // Envoyer un E-Mail a l'étudiant pour l'informer du changement de statu de la commande

        $order->statu_id = $order->statu_id + 1;
        $order->save();


        return redirect('/admin');;
    }

    public function reset(){

        $orders = Order::all();

        foreach($orders as $order){
            $order->archived = 1;
            $order->save();
        }


        return redirect('/admin');;
    }







}
