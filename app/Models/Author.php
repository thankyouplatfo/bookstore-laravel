<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name','desc'];
    //
    public function books()
    {
        # code...
        return $this->belongsToMany(Book::class,'book_authors', 'book_id', 'author_id', 'id', 'id');
    }

    
}
