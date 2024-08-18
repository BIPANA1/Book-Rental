<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $memberCount = DB::table('members')->count();
        $bookCount = DB::table('books')->count();
        $bookRent = DB::table('book_transactions')->count();
        return view('admin.dashboard', compact('memberCount','bookCount','bookRent'));
    }
}
