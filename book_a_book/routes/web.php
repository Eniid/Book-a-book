<?php

use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsIndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [StudentsIndexController::class, 'index'])->middleware('auth')->middleware('orderd')->name('student_home') ;
    Route::post('/plus', [StudentsIndexController::class, 'plus'])->middleware('auth');
    Route::post('/moins', [StudentsIndexController::class, 'moins'])->middleware('auth');

    Route::get('/commande', [StudentsIndexController::class, 'view'])->middleware('auth')->name('student_cart') ;
    Route::post('/del', [StudentsIndexController::class, 'del'])->middleware('auth');
    Route::post('/valid', [StudentsIndexController::class, 'valid'])->middleware('auth');

    Route::get('/commande-en-cours', [StudentsIndexController::class, 'commande'])->middleware('noorderd')->name('student_order');



//* Admin
    Route::get('/admin', [StudentsController::class, 'index'])->name('admin')->middleware('admin');
    Route::get('/admin/stock', [AdminIndexController::class, 'read'])->name('admin_stock')->middleware('admin');
    Route::get('/admin/books', [BooksController::class, 'read'])->name('admin_book')->middleware('admin');

    Route::post('/admin/books', [BooksController::class, 'store']);

    Route::get('/admin/student/{user:id}', [StudentsController::class, 'read'])->middleware('admin');

    Route::get('/admin/books/edit/{book:id}', [BooksController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/books', [BooksController::class, 'update']);
    Route::post('/admin/del/book', [BooksController::class, 'del']);

    Route::get('/admin/books/new', [BooksController::class, 'create']);


    Route::post('/stock/edit', [BooksController::class, 'stock']);


    Route::post('/student/com', [StudentsController::class, 'com']);


    //Les routes de modification des Ordres :D
    Route::post('/order/payed', [OrderController::class, 'payed']);
    Route::post('/order/avalible', [OrderController::class, 'abalible']);
    Route::post('/order/finished', [OrderController::class, 'finished']);

    Route::post('/reset', [OrderController::class, 'reset']);






//* PROFIL
    Route::get('/profil', [UserController::class, 'index'])->middleware('auth');
    Route::get('/admin/profil', [UserController::class, 'adminp'])->middleware('auth');


    Route::post('/profil', [UserController::class, 'update'])->middleware('auth');
    Route::post('/admin/profil', [UserController::class, 'adminupdate'])->middleware('auth');



//* register
    Route::get('/log', [RegisterController::class, 'read']);

