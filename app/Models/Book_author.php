<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_author extends Model
{
    use HasFactory;
    protected $fillable=['book_id','author_id'];

    public function Author()
    {
        return $this->belongsToMany(Author::class,'author');
    }

    public function Book()
    {
        return $this->belongsToMany(Book::class,'book');
    }
}
