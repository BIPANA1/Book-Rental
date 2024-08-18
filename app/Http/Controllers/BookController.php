<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Book_author;
use App\Models\Category;
use App\Services\BookServices;
use Illuminate\Http\Request;

class BookController extends Controller
{

     public function __construct(
        protected BookServices $bookServices
      ) {
      }

    public function index()
    {
        $book = Book::all();
        return view('admin.pages.book.index', compact('book'));
    }

    public function create()
    {
        $author = Author::pluck('name','id')->toArray();
        // dd($author);
        $category = Category::pluck('name','id')->toArray();
        return view('admin.pages.book.create', compact('category','author'));
    }

    public function store(Request $request)
    {
        // dd($request->author_id);
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'no_of_pages' => 'required|integer|min:1',
            'isbn' => 'required|integer|min:0|unique:books,isbn',
            'rating' => 'required|integer|min:0|max:5',
            'stock_count' => 'required|integer|min:0',
            'published_date' => 'required|date',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'author_id' => 'required|array|exists:authors,id',
            'author_id.*' => 'integer|distinct',
            'category_id' => 'required|exists:categories,id',
        ]);

          $image_title = null;
          if ($request->hasFile('photo')) {
              $img = $request->file('photo');
              $imgpath = 'upload/user/';
              $imgname = now()->format('ymdhis') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
              $img->move($imgpath, $imgname);
              $image_title = $imgpath . $imgname;
          }

          $data['photo'] = $image_title;
          $book = $this->bookServices->create($data);

          $book->authors()->sync($request->input('author_id'));
           return redirect()->route('book.show', ['id' => $book->id])->with('success', 'Book Successfully created');
    }

    public function show($id)
    {
        $book = $this->bookServices->find($id);
        $category = Category::find($book->category_id);
        $authors = $book->authors;
        return view('admin.pages.book.show', compact('book','category','authors'));
    }

    public function edit($id)
    {
        $book = $this->bookServices->find($id);
        $category = Category::all();
        return view('admin.pages.book.edit',compact('book','category'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'no_of_pages' => 'required',
            'isbn' => 'required',
            'rating' => 'required',
            'stock_count' => 'required',
            'published_date' => 'required',
            'photo' => 'nullable|image',
            'category_id' => 'required',
        ]);
        $book = Book::findOrFail($id);
        if ($request->hasFile('photo')) {
            $img = $request->file('photo');
            $imgpath = 'upload/user/';
            $imgname = now()->format('ymdhis') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
            $img->move($imgpath, $imgname);
            $data['photo'] = $imgpath . $imgname;
        } else {
            $data['photo'] = $book->photo;
        }
        $book = $this->bookServices->update($data, $id);
        return redirect()->route('book.show',$book->id);

    }

    public function destroy($id)
    {
        $this->bookServices->delete($id);
        return redirect()->route('book.index');
    }
}
