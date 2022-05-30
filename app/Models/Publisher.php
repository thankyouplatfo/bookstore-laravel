<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name', 'address'];
    //
    public function books()
    {
        # code...
        return $this->hasMany(Book::class);
    }
}
