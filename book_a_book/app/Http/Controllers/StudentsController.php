<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    
    public function read(){
        
        $students = User::all();
        
        return view('admin.students', compact('students'));
    }

    
}
