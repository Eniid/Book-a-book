<?php

use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsIndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//* Student 
Route::get('/', [StudentsIndexController::class, 'read'])->middleware('auth');


//* Admin
Route::get('/admin', [AdminIndexController::class, 'read']);
Route::get('/admin/students', [StudentsController::class, 'read']);
Route::get('/admin/books', [BooksController::class, 'read']);


//* register 
Route::get('/log', [RegisterController::class, 'read']);

