<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Book_author;
use App\Models\User;

class BookRepository implements BookRepositoryInterface
{
    public function all()
    {
        return Book::all();
    }

public function create(array $data)
{
    $authorIds = $data['author_id'];
    unset($data['author_id']);
    $book = Book::create($data);
    $book->authors()->sync($authorIds);
    return $book;
}

    public function update(array $data, $id)
    {
        $user = Book::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Book::findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        return Book::findOrFail($id);
    }
}
