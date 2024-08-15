<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=['name','no_of_pages','isbn','rating','stock_count','published_date','photo','author_id','category_id'];

    // public function Category()
    // {
    //     return $this->hasMany(Category::class,'category');
    // }
    public function category()
{
    return $this->belongsTo(Category::class);
}


    public function Author()
    {
        return $this->belongsTo(Author::class,'author');
    }

}
