<?php

namespace App\Traits;

use App\Models\{User, Author, Book, Category, Publisher};
use Carbon\Carbon;

trait IncModelsTrait
{
    public $author;
    public $book;
    public $category;
    public $publisher;
    public $user;
    public $carbon;
    //
    public function __construct(Author $author, Book $book, Category $category, Publisher $publisher, User $user, Carbon $carbon)
    {
        $this->author = $author;
        $this->book = $book;
        $this->category = $category;
        $this->publisher = $publisher;
        $this->user = $user;
        $this->carbon = $carbon;
    }
}
