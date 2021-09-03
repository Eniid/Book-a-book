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


        return view('admin.students', compact('students', 'inProcess'));
    }

    public function read(User $user){

        $inProcess = Order::where('statu_id', '<>', '1')->where('statu_id', '<>', '5')->count();

        return view('admin.student', compact('user', 'inProcess'));
    }

}

