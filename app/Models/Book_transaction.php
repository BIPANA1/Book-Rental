<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_transaction extends Model
{
    use HasFactory;

    protected $table = 'book_transactions';
protected $fillable=['book_id','code','from_date','to_date','rent_status','member_id','active_closed'];

public function members()
{
    return $this->belongsTo(Members::class,'member_id');

}

public function book()
{
    return $this->belongsTo(Book::class,'book_id');
}
}
