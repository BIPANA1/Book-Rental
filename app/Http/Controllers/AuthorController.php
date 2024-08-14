<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::all();
        return view('admin.pages.author.index',compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $author = new Author();
        $author->name  = $request->input('name');
        $author->email = $request->input('email');
        $author->phone = $request->input('phone');
        $author->save();
        return view('admin.pages.author.index')->with('sucess','Author successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = Author::find($id);
        $roles = Role::pluck('name', 'name');
        return view('admin.pages.author.edit',compact('author','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $author = Author::find($id);
        $author->name  = $request->input('name');
        $author->email = $request->input('email');
        $author->phone = $request->input('phone');
        $author->update();
        return view('admin.pages.author.index')->with('success','Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->back()->with('succes','Successfully deleted');

    }
}
