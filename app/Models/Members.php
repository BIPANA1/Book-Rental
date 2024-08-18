<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $table = 'members';


    protected $fillable= ['name','email','phone','address'];

    public function Book_transaction()
    {
        return $this->belongsTo(Book_transaction::class,'book_transaction');
    }
}
