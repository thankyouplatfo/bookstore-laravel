<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'admin_level',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //
    public function isAdmin()
    {
        return $this->admin_level > 0 ? true : false;
    }

    public function isSuperAdmin()
    {
        return $this->admin_level > 1 ? true : false;
    }
    //
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    //
    public function rated(Book $book)
    {
        # code...
        return $this->ratings->where('book_id', $book->id)->isNotEmpty();
    }
    //
    public function bookRating(Book $book)
    {
        # code...
        return $this->rated($book) ? $this->ratings->where('book_id', $book->id)->first() : NULL;
    }
}
