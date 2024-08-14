<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    // ->middleware('role');
    Route::resource('users', UserController::class);
    // ->middleware('role:admin');

    //Category
    Route::get('/category-index',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category-create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category-update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::delete('/category-destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

    //Author
    Route::get('/index',[AuthorController::class,'index'])->name('author.index');
    Route::get('/create',[AuthorController::class,'create'])->name('author.create');
    Route::post('/store',[AuthorController::class,'store'])->name('author.store');
    Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('author.edit');
    Route::post('/update/{id}',[AuthorController::class,'update'])->name('author.update');
    Route::delete('/destroy/{id}',[AuthorController::class,'destroy'])->name('author.destroy');

    // Book
    Route::get('/book-index',[BookController::class,'index'])->name('book.index');
    Route::get('/book-create',[BookController::class,'create'])->name('book.create');
    Route::post('/book-store',[BookController::class,'store'])->name('book.store');
    Route::get('/book-edit/{id}',[BookController::class,'edit'])->name('book.edit');
    Route::post('/book-update/{id}',[BookController::class,'update'])->name('book.update');
    Route::get('/book-show/{id}',[BookController::class,'show'])->name('book.show');
    Route::delete('/book-destroy/{id}',[BookController::class,'destroy'])->name('book.destroy');


});
