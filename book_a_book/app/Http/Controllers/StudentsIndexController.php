<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsIndexController extends Controller
{
    //


    public function index(Request $request){
        $blocs = Bloc::has('books')->with('books')->get();
        $bloc_id = request('bloc')??1;
        $bloc = $blocs->where('id', $bloc_id)->first();

    
        return view('student.index', compact('blocs', 'bloc', 'bloc_id'));
    }


    public function store(Request $request){
        
        $curent_user_id = Auth::user()->id; 
        $order = Order::where('user_id', $curent_user_id)->first(); 

        if(!$order){
            $new_order = new Order(); 
            $new_order -> user_id = $curent_user_id; 
            $new_order -> archive = 0;
            $new_order -> save();
        };

        $this_order_id  = $order->id; 
        
        $new_item = new BookOrder(); 
        $new_item -> order_id = $this_order_id; 
        $new_item -> book_id = request('book_id'); 
        $new_item -> save();
    

        return redirect('/');
    }

}
