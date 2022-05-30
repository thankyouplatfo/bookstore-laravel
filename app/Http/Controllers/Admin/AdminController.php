<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, Author, Book, Category, Publisher};
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $author;
    public $book;
    public $category;
    public $publisher;
    public $user;
    //
    public function __construct(Author $author, Book $book, Category $category, Publisher $publisher, User $user)
    {
        $this->author = $author;
        $this->book = $book;
        $this->category = $category;
        $this->publisher = $publisher;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors    = $this->author->count();
        $books      = $this->book->count();
        $categories  = $this->category->count();
        $publishers = $this->publisher->count();
        $users      = $this->user->count();
        //
        return view('admin.index', compact('authors', 'books', 'categories', 'publishers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
