<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_transaction extends Model
{
    use HasFactory;


protected $fillable=['book_id','code','from_date','to_date','rent_status','member_id','active_closed'];

public function Members()
{
    return $this->hasMany(Members::class,'members');

}

public function Book()
{
    return $this->hasMany(Book::class,'book');
}
}
