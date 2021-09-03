<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;


class OrderController extends Controller
{



    public function payed(Request $request){

        $order = Order::where('user_id', request('user_id'))->first();


        // Envoyer un E-Mail a l'étudiant pour l'informer du changement de statu de la commande

        $order->statu_id = $order->statu_id + 1;
        $order->save();


        return redirect('/admin');;
    }



    public function abalible(Request $request){

        $order = Order::where('user_id', request('user_id'))->with('books')->first();

        // Envoyer un E-Mail a l'étudiant pour l'informer du changement de statu de la commande
        // Diminuer les stoques pour chaque livre de la commande :D

        //dd($order);
        foreach($order->books as $book){
            $book->stock = $book->stock - 1;
            $book->save();
        }


        $order->statu_id = $order->statu_id + 1;
        $order->save();


        return redirect('/admin/students');;
    }

    public function finished(Request $request){

        $order = Order::where('user_id', request('user_id'))->first();


        // Envoyer un E-Mail a l'étudiant pour l'informer du changement de statu de la commande

        $order->statu_id = $order->statu_id + 1;
        $order->save();


        return redirect('/admin/students');;
    }



    public function reset(){

        $orders = Order::all();

        foreach($orders as $order){
            $order->archived = 1;
            $order->save();
        }


        return redirect('/admin/students');;
    }







}
