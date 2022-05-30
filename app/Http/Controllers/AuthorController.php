<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Http\Requests\StoreauthorRequest;
use App\Http\Requests\UpdateauthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreauthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreauthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateauthorRequest  $request
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateauthorRequest $request, author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        //
    }
    //
    public function result(Author $author)
    {
        # code...
        //
        $books = $author->books()->paginate(10);
        //
        $title = ' الكتب التابعة للمؤلف:' . '   ' . $author->name;
        //
        return view('gallery', compact('books', 'title'));
    }
    //
    public function list(Author $author)
    {
        # code...
        $authors = $author->all()->sortBy('name');
        //
        $title = 'المؤلفين';
        //
        return view('authors.index', compact('authors', 'title'));
    }
    //
    public function search(Request $request)
    {
        $categories = Author::where('name', 'like', "%{$request->trem}%")->get()->sortBy('name');
        //
        $title = ' نتائج البحث عن: ' . $request->trem;
        //
        return view('categories.index', compact('categories', 'title'));
    }
}
