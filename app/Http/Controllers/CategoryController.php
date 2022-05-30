<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Request;
use App\Models\{User, Author, Book, Category, Publisher};
use App\Traits\IncModelsTrait;

class CategoryController extends Controller
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
        $categories = $this->category->orderBy('id', 'desc')->paginate(10);
        //
        $title = ' التصنيفات:';
        //
        return view('admin.categories.index', compact('categories', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        //
        $this->category->create($request->all());
        //
        return back()->with('msg', trans('site.msg_c'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        //
        $this->category->find($category->id)->update($request->all());
        //
        return back()->with('msg', trans('site.msg_u'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
        $this->category->find($category->id)->delete();
        //
        return back()->with('msg', trans('site.msg_d'));
    }
    //
    public function result(Category $category)
    {
        # code...
        //
        $books = $category->books()->paginate(10);
        //
        $title = ' الكتب التابعة للتصنيف:' . '   ' . $category->name;
        //
        return view('gallery', compact('books', 'title'));
    }
    //
    public function list(Category $category)
    {
        # code...
        $categories = $category->all()->sortBy('name');
        //
        $title = 'التصنيفات';
        //
        return view('categories.index', compact('categories', 'title'));
    }
    //
    public function search(Request $request)
    {
        $categories = Category::where('name', 'like', "%{$request->trem}%")->get()->sortBy('name');
        //
        $title = ' نتائج البحث عن: ' . $request->trem;
        //
        return view('categories.index', compact('categories', 'title'));
    }
}
