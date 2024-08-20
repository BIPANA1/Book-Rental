<?php

namespace App\Http\Controllers;

use App\Exports\RentExport;
use App\Models\Book;
use App\Models\Book_transaction;
use App\Models\Members;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class RentController extends Controller
{
    public function export()
    {
        $filename ="rent.xlsx";
        return Excel::download(new RentExport, $filename);
    }
    public function index()
    {
        $rent = Book_transaction::with('member')->where('rent_status', 'rent')
        ->where('active_closed','active')
        ->get();
        $member = Members::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.index',  compact('rent','member'));

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

    public function show($id)
    {
        $rent = Book_transaction::with('member')->findOrFail($id);
        $members = Members::pluck('name', 'id')->toArray();
        return view('admin.pages.Transaction.Rent.show', compact('rent', 'members'));
    }


    public function edit($id)
    {
        $rent = Book_transaction::with('members')->find($id);
        $book = Book::pluck('name','id')->toArray();
        $members = Members::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.edit', compact('rent','members','book'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'code' => 'required|string',
            'number_of_days' => 'required|integer|min:1',
            'rent_status' => 'nullable',
            'active_closed' => 'nullable',
        ]);

        $member_id = Members::findOrFail($id);

        $rentExist = Book_transaction::where('member_id', $member_id)
            ->where('rent_status', 'rent')
            ->where('active_closed', 'active')
            ->exists();

        if ($rentExist) {
            return redirect()->back()->with('error', 'Sorry! You cannot rent another book until the current one is returned.');
        } else {
            $book = Book::findOrFail($request->input('book_id'));

            if ($book->stock_count > 0) {
                // stock count Decrease
                $book->stock_count -= 1;
                $book->save();

                $from_date = Carbon::now();
                $to_date = $from_date->copy()->addDays($request->input('number_of_days'));

                // Update the existing rent transaction
                $rent = Book_transaction::findOrFail($id);
                $rent->book_id = $request->input('book_id');
                $rent->member_id = $request->input('member_id');
                $rent->code = $request->input('code');
                $rent->from_date = $from_date;
                $rent->to_date = $to_date;
                $rent->rent_status = 'rent';
                $rent->active_closed = 'active';

                if ($rent->save()) {
                    return redirect()->route('rent.index')->with('success', 'Rent transaction updated successfully.');
                } else {
                    $book->stock_count += 1;
                    $book->save();

                    return redirect()->back()->with('error', 'Failed to update the rent transaction.');
                }
            } else {
                return redirect()->back()->with('error', 'Insufficient stock to rent the book.');
            }
        }
    }

    public function exportDataInExcel(Request $request)
    {
        if($request->type == 'xlsx'){

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == 'csv'){

            $fileExt = 'csv';
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == 'xls'){

            $fileExt = 'xls';
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        else{

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }


        $filename = "rent-".date('d-m-Y').".".$fileExt;
        return Excel::download(new RentExport, $filename, $exportFormat);
    }

    public function example()
    {
        $rent = Book_transaction::with('member')->where('rent_status', 'rent')
        ->where('active_closed','active')
        ->get();
        $member = Members::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Rent.example',  compact('rent','member'));

    }








    }


