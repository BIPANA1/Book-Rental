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

        $authors = Author::all();
        return view('admin.pages.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = Author::all();
        return view('admin.pages.author.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:5,15'],
        ]);
        $author = new Author();
        $author->name  = $request->input('name');
        $author->email = $request->input('email');
        $author->phone = $request->input('phone');
        $author->save();
        return redirect()->route('author.index')->with('sucess','Author successfully created!');
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:5,15'],
        ]);
        $author = Author::find($id);
        $author->name  = $request->input('name');
        $author->email = $request->input('email');
        $author->phone = $request->input('phone');
        $author->update();
        return redirect()->route('author.index')->with('success','Successfully updated');

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
