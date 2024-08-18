<?php

namespace App\Http\Controllers;

use App\Models\Book_transaction;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index()
    {
        return view('admin.pages.Transaction.Return.index');

    }

    public function create()
{
    $book_transactions = Book_transaction::pluck('code', 'id')->toArray();
    return view('admin.pages.Transaction.Return.create', compact('book_transactions'));
}

}
