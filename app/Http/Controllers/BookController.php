<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Services\BookServices;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(
        protected BookServices $bookServices
      ) {
      }



    public function index()
    {
        return view('admin.pages.book.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('name','id')->toArray();
        return view('admin.pages.book.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'no_of_pages' => 'required',
            'isbn' => 'required',
            'rating' => 'required',
            'stock_count' => 'required',
            'published_date' => 'required',
            'photo' => 'required',
            'category_id' => 'required',
        ]);
    // dd($request->all())

          $image_title = null;
          if ($request->hasFile('photo')) {
              $img = $request->file('photo');
              $imgpath = 'upload/user/';
              $imgname = now()->format('ymdhis') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
              $img->move($imgpath, $imgname);
              $image_title = $imgpath . $imgname;
          }
        //   dd($image_title);

          $data['photo'] = $image_title;
            // dd($data);
          $book = $this->bookServices->create($data);
          return redirect()->route('book.show',$book->id)->with('success','Book Successfully created');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return redirect()->route('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
