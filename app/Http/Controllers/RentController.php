<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_transaction;
use App\Models\Members;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rent = Book_transaction::with('book')->get();
        $books = Book::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.index',  compact('rent','books'));

    }

    public function create()
    {
        $member = Members::pluck('name','id')->toArray();
        $book = Book::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.create', compact('member','book'));

    }

    public function store(Request $request)
{
    $request->validate([
        'book_id' => ['required'],
        'member_id' => ['required'],
        'code' => ['required', 'string'],
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
        'rent_status' => 'nullable',
        'active_closed' => 'nullable',
    ]);

    $book = Book::findOrFail($request->input('book_id'));

    if ($book->stock_count > 0) {
        $book->stock_count -= 1;
        $book->save();

        $rent = new Book_transaction();
        $rent->book_id = $request->input('book_id');
        $rent->member_id = $request->input('member_id');
        $rent->code = $request->input('code');
        $rent->from_date = $request->input('from_date');
        $rent->to_date = $request->input('to_date');
        $rent->rent_status = 'rent';
        $rent->active_closed = 'active';

        if ($rent->save()) {
            return redirect()->route('rent.index')->with('success', 'Successfully created');
        } else {
            $book->stock_count += 1;
            $book->save();

            return back()->with('error', 'Failed to save data.');
        }
    } else {
        return back()->with('error', 'Insufficient stock to rent the book.');
    }
}


}
