<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable =['name','email','phone'];

    public function Book()
    {
        return $this->hassMany(Book::class,'book');
    }
}
