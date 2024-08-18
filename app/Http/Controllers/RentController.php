<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_transaction;
use App\Models\Members;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentController extends Controller
{
    public function index()
    {
        $rent = Book_transaction::with('members')->get();
        $members = Members::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.index',  compact('rent','members'));

    }

    public function create()
    {
        $member = Members::pluck('name','id')->toArray();
        $book = Book::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.create', compact('member','book'));

    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'code' => 'required|string|unique:book_transactions,code',
            'number_of_days' => 'required|integer|min:1',
            'rent_status' => 'nullable',
            'active_closed' => 'nullable',
        ]);

        // dd($request);
        $member_id = $request->input('member_id');
        $rentExist = Book_transaction::where('member_id', $member_id)
            ->where('rent_status', 'rent')
            ->where('active_closed', 'active')
            ->exists();

        if ($rentExist) {
            return redirect()->back()->with('error', 'Sorry! You cannot rent another book until the current one is returned.');
        } else {
            $book = Book::findOrFail($request->input('book_id'));
            if ($book->stock_count > 0) {
                $book->stock_count -= 1;
                $book->save();

                $from_date = Carbon::now();
                $to_date = $from_date->copy()->addDays($request->input('number_of_days'));

                $rent = new Book_transaction();
                $rent->book_id = $request->input('book_id');
                $rent->member_id = $request->input('member_id');
                $rent->code = $request->input('code');
                $rent->from_date = $from_date;
                $rent->to_date = $to_date;
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
}
