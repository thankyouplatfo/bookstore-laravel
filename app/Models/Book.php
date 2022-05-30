<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        "category_id",
        "publisher_id",
        "title",
        "isbn",
        "desc",
        "publish_year",
        "number_of_pages",
        "number_of_copies",
        "price",
        "cover_image",
    ];
    //
    public function category()
    {
        # code...
        return $this->belongsTo(Category::class);
    }
    //
    public function publisher()
    {
        # code...
        return $this->belongsTo(Publisher::class);
    }
    //
    public function authors()
    {
        # code...
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id', 'id', 'id');
    }
}
