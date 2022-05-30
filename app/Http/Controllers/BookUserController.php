<?php

namespace App\Http\Controllers;

use App\Models\book_user;
use App\Http\Requests\Storebook_userRequest;
use App\Http\Requests\Updatebook_userRequest;

class BookUserController extends Controller
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
     * @param  \App\Http\Requests\Storebook_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebook_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book_user  $book_user
     * @return \Illuminate\Http\Response
     */
    public function show(book_user $book_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book_user  $book_user
     * @return \Illuminate\Http\Response
     */
    public function edit(book_user $book_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_userRequest  $request
     * @param  \App\Models\book_user  $book_user
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebook_userRequest $request, book_user $book_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_user  $book_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(book_user $book_user)
    {
        //
    }
}
