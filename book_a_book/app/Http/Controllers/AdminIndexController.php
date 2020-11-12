<?php

namespace App\Http\Controllers;

use App\Models\Bloc;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function read(){
        $blocs = Bloc::all();

        return view('admin.index', compact('blocs'));
    }

}
