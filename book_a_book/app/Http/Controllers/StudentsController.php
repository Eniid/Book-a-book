<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function index(){

        $students = User::all();
        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();
        $orderd = Order::where('statu_id', '=', '2')->count();
        $payed = Order::where('statu_id', '=', '3')->count();
        $finished = Order::where('statu_id', '=', '5')->count();

        return view('admin.students', compact('students', 'inProcess', 'orderd', 'payed', 'finished'));
    }




    public function read(User $user){

        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();
        $orderd = Order::where('statu_id', '=', '2')->count();
        $payed = Order::where('statu_id', '=', '3')->count();
        $finished = Order::where('statu_id', '=', '5')->count();


        //$oldOrders = Order::withoutGlobalScope(ArchivedScope::class)->where('user_id', $user->id)->with('books')->get();
        $oldOrders = Order::withoutGlobalScope('pastOrders')->where('user_id', $user->id)->where('archived', true)->with('books')->get();


        $user->load('orders', 'orders.books', 'orders.statu');

            foreach($user->orders as $order){
                    $order->quantities = $order->books->countBy(function ($item) {
                        return $item->id;
                    });


                //$order->books->unique('id');
            }



        //dd($user);


        //$user_order = User::where('id', $user->id)->with('orders')->first();

        //dd(Order::withoutGlobalScope('pastOrders')->get());
        return view('admin.student', compact('user', 'inProcess', 'oldOrders', 'orderd', 'payed', 'finished'));
    }



    public function com(Request $request){

        $students = User::where('id', request('user_id'))->first();

        $students->commentaire = request('com');
        $students->save();


        return redirect('/admin/student/'.request('user_id'));
    }


}

