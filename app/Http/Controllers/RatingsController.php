<?php

namespace App\Http\Controllers;

use App\Models\ratings;
use App\Http\Requests\StoreratingsRequest;
use App\Http\Requests\UpdateratingsRequest;

class RatingsController extends Controller
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
     * @param  \App\Http\Requests\StoreratingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreratingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function show(ratings $ratings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function edit(ratings $ratings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateratingsRequest  $request
     * @param  \App\Models\ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateratingsRequest $request, ratings $ratings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function destroy(ratings $ratings)
    {
        //
    }
}
