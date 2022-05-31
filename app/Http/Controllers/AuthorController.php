<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Http\Requests\StoreauthorRequest;
use App\Http\Requests\UpdateauthorRequest;
use App\Traits\IncModelsTrait;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use IncModelsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors = $this->author->orderBy('id','desc')->paginate(10);
        //
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.authors.create');
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
        $this->author->create($request->all());
        //
        return back()->with('msg', trans('site.msg_c'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        //return view('admin.authors.edit', compact('author'));
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
        return view('admin.authors.edit', compact('author'));
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
        $this->author->find($author->id)->update($request->all());
        //
        return back()->with('msg', trans('site.msg_u'));
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
        $this->author->find($author->id)->delete();
        //
        return back()->with('msg', trans('site.msg_d'));
    }
    //
    public function result(Author $author)
    {
        # code...
        //
        $authors = $author->authors()->paginate(10);
        //
        $title = ' الكتب التابعة للمؤلف:' . '   ' . $author->name;
        //
        return view('gallery', compact('authors', 'title'));
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
