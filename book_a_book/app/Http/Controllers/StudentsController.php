<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function index(){

        $students = User::all();

        return view('admin.students', compact('students'));
    }

    public function read(User $user){


        return view('admin.student', compact('user'));
    }

}

