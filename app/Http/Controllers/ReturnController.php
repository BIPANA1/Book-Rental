<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index()
    {
        return view('admin.pages.Transaction.Return.index');

    }

    public function create()
    {
        return view('admin.pages.Transaction.Return.create');

    }
}
