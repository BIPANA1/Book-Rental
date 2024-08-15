<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembersController;
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
//admin/books/
    Route::resource('roles', RoleController::class);
    // ->middleware('role');
    Route::resource('users', UserController::class);
    // ->middleware('role:admin');


    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    //Category
    Route::get('admin/categories',[CategoryController::class,'index'])->name('category.index');
    Route::get('admin/categories/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('admin/categories',[CategoryController::class,'store'])->name('category.store');
    Route::get('admin/categories/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('admin/categories/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::delete('admin/categories/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

    //Author
    Route::get('admin/author',[AuthorController::class,'index'])->name('author.index');
    Route::get('admin/author/create',[AuthorController::class,'create'])->name('author.create');
    Route::post('admin/author',[AuthorController::class,'store'])->name('author.store');
    Route::get('admin/author/edit/{id}',[AuthorController::class,'edit'])->name('author.edit');
    Route::post('admin/author/update/{id}',[AuthorController::class,'update'])->name('author.update');
    Route::delete('admin/author/destroy/{id}',[AuthorController::class,'destroy'])->name('author.destroy');

    // Book
    Route::get('admin/book',[BookController::class,'index'])->name('book.index');
    Route::get('admin/book/create',[BookController::class,'create'])->name('book.create');
    Route::post('admin/book',[BookController::class,'store'])->name('book.store');
    Route::get('admin/book/edit/{id}',[BookController::class,'edit'])->name('book.edit');
    Route::post('admin/book/update/{id}',[BookController::class,'update'])->name('book.update');
    Route::get('admin/book/show/{id}',[BookController::class,'show'])->name('book.show');
    Route::delete('admin/book/destroy/{id}',[BookController::class,'destroy'])->name('book.destroy');

    //Members
    Route::get('admin/member',[MembersController::class,'index'])->name('member.index');
    Route::get('admin/member/create',[BookController::class,'create'])->name('member.create');
    Route::post('admin/member/',[BookController::class,'store'])->name('member.store');
    Route::get('admin/member/edit/{id}',[BookController::class,'edit'])->name('member.edit');
    Route::post('admin/member/update/{id}',[BookController::class,'update'])->name('member.update');
    Route::get('admin/member/show/{id}',[BookController::class,'show'])->name('member.show');
    Route::delete('admin/member/destroy/{id}',[BookController::class,'destroy'])->name('member.destroy');


});
