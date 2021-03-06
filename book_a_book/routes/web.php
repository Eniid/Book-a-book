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
Route::get('/', [StudentsIndexController::class, 'index'])->middleware('auth');
Route::post('/', [StudentsIndexController::class, 'store'])->middleware('auth');


//* Admin
Route::get('/admin', [AdminIndexController::class, 'read']);
Route::get('/admin/students', [StudentsController::class, 'read']);
Route::get('/admin/books', [BooksController::class, 'read']);


Route::get('/admin/books/edit/{book:id}', [BooksController::class, 'update']);
Route::patch('/admin/books', [BooksController::class, 'update']);
Route::post('/admin/books/', [BooksController::class, 'del']);



Route::get('/admin/books/new', [BooksController::class, 'create']);
Route::post('/admin/books', [BooksController::class, 'store']);


//* register 
Route::get('/log', [RegisterController::class, 'read']);

