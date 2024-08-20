<?php

namespace App\Exports;

use App\Models\Book_transaction;
use App\Models\Members;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('admin.pages.Transaction.Rent.example',[
            'rent' => Book_transaction::with('member')->where('rent_status','rent')->get(),
            // 'member' => Members::pluck('name','id')->toArray()
        ]);

    }
    // public function collection()
    // {
    //     return Book_transaction::with('member')->where('rent_status', 'rent')
    //     ->get();
    // }

    // public function headings(): array
    // {
    //     return[
    //         'Transaction_id',
    //         'Book_id',
    //         'Code',
    //         'from_date',
    //         'to_date',
    //         'Rent_status',
    //         'member_id',
    //         'Active_closed',
    //         'Book_transaction',
    //         'created_at',
    //         'updated_at'
    //     ];
    // }
}
