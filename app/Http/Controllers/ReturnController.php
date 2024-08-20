<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_transaction;
use App\Models\Members;
use Illuminate\Http\Request;

use function PHPSTORM_META\elementType;

class ReturnController extends Controller
{
    public function index(Request $request)
    {
        $member_id = $request->get('member_id');
if(!$member_id){
    $book_transactions = Book_transaction::with('member:id,name')
            ->select('id', 'code', 'member_id','from_date','to_date')
            ->where('rent_status', 'rent')
            ->where('active_closed', 'active')
            ->get();

}else{
    $book_transactions = Book_transaction::with('member:id,name')
            ->select('id', 'code', 'member_id','from_date','to_date')
            ->where('rent_status', 'rent')
            ->where('member_id',$member_id)
            ->where('active_closed', 'active')
            ->get();
}
        return view('admin.pages.Transaction.Return.index', compact('book_transactions'));
    }

    public function create()
{
    $book_transactions = Book_transaction::select('id', 'code')
        ->where('rent_status', 'rent')
        ->where('active_closed','active')
        ->get();

    return view('admin.pages.Transaction.Return.create', compact('book_transactions'));
}

    // public function edit($id)
    // {
    //     $transaction = Book_transaction::findOrFail($id);
    //     return view('admin.pages.Transaction.Return.edit',compact('transaction'));

    // }

    // public function getTransactionDetails($id)
    // {
    //     $transaction = Book_transaction::with('member')->find($id);
    //     if ($transaction) {
    //         return response()->json([
    //             'from_date' => $transaction->from_date,
    //             'to_date' => $transaction->to_date,
    //             'member' => $transaction->member->name,
    //             'active_close' => $transaction->active_closed,
    //             'rent_status' => $transaction->rent_status,

    //         ]);
    //     } else {
    //         return response()->json(['error' => 'Transaction not found.'], 404);
    //     }
    // }

    public function update(Request $request,$id)
    {
        // dd('ahdbhjdb');
        // dd($id);
        $request->validate([

            'active_closed' => 'required|string',
            'rent_status' => 'required|string',
        ]);


        $transaction = Book_transaction::find($id);
        if ($transaction) {
            $transaction->active_closed = 'close';
            $transaction->rent_status = 'return';
            $transaction->update();
            // dd($transaction);

            $book = Book::find($transaction->book_id);
            if ($book) {
                $book->increment('stock_count');
            }
            return redirect()->route('return.index')->with('success', 'Transaction updated successfully.');
        } else {
            return back()->with('error', 'Transaction not found.');
        }

    }

    public function show($id)
    {
        $return = Book_transaction::with('member')
        ->where('id',$id)
        ->where('rent_status', 'return')
        ->where('active_closed','close')
        ->get();
        $member = Members::pluck('name','id')->toArray();
        return view('admin.pages.Transaction.Return.show', compact('return','member'));

    }

    public function search(Request $request)
    {
        $member = Members::where('id','like', '%' .$request->member_id . '%')->get();
        $book_transactions = Book_transaction::with('member:id,name')
        ->select('id', 'code', 'member_id','from_date','to_date')
        ->where('rent_status', 'rent')
        ->where('active_closed', 'active')
        ->get();

        return view('admin.pages.Transaction.Return.index',compact('member','book_transactions'));

    }







}
