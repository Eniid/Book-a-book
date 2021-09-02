<?php

use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsIndexController;
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
    Route::get('/', [StudentsIndexController::class, 'index'])->middleware('auth');
    Route::post('/plus', [StudentsIndexController::class, 'plus'])->middleware('auth');
    Route::post('/moins', [StudentsIndexController::class, 'moins'])->middleware('auth');

    Route::get('/commande', [StudentsIndexController::class, 'view'])->middleware('auth');
    Route::post('/del', [StudentsIndexController::class, 'del'])->middleware('auth');
    Route::post('/valid', [StudentsIndexController::class, 'valid'])->middleware('auth');

    Route::get('/commande-en-cours', [StudentsIndexController::class, 'commande'])->middleware('auth');



//* Admin
    Route::get('/admin', [AdminIndexController::class, 'read']);
    Route::get('/admin/students', [StudentsController::class, 'index']);
    Route::get('/admin/books', [BooksController::class, 'read']);

    Route::get('/admin/student/{user:id}', [StudentsController::class, 'read']);

    Route::get('/admin/books/edit/{book:id}', [BooksController::class, 'update']);
    Route::patch('/admin/books', [BooksController::class, 'update']);
    Route::post('/admin/books/del', [BooksController::class, 'del']);



    Route::get('/admin/books/new', [BooksController::class, 'create']);
    Route::post('/admin/books', [BooksController::class, 'store']);



//* PROFIL
    Route::get('/profil', [UserController::class, 'index'])->middleware('auth');
    Route::post('/profil', [UserController::class, 'update'])->middleware('auth');



//* register
    Route::get('/log', [RegisterController::class, 'read']);

