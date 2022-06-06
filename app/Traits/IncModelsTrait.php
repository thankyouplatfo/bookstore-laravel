<?php

namespace App\Traits;

use App\Models\{User, Author, Book, Cart, Category, Publisher, Rating};
use Carbon\Carbon;

trait IncModelsTrait
{
    public $author;
    public $book;
    public $category;
    public $publisher;
    public $user;
    public $carbon;
    public $rating;
    public $cart;
    //
    public function __construct(Author $author, Book $book, Category $category, Publisher $publisher, User $user, Carbon $carbon, Rating $rating, Cart $cart)
    {
        $this->author = $author;
        $this->book = $book;
        $this->category = $category;
        $this->publisher = $publisher;
        $this->user = $user;
        $this->carbon = $carbon;
        $this->rating = $rating;
        $this->cart = $cart;
    }
    //
    //public function successCRUD()
    //{
    //    # code...
    //}
}
