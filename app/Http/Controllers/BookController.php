<?php

namespace App\Http\Controllers;

use App\Models\{User, Author, Book, Category, Publisher, Rating};
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Traits\ImageUploadTrait;
use App\Traits\IncModelsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    use ImageUploadTrait;
    use IncModelsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = $this->book->orderBy('id', 'desc')->paginate(10);

        //
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->author->all();
        $categories = $this->category->all();
        $publishers = $this->publisher->all();
        //
        return view('admin.books.create', compact('authors', 'categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookRequest $request)
    {
        $data = $request->validated();
        $data['cover_image'] = $this->uploadImage($request->cover_image);
        //
        $this->book = Book::create($data);
        $this->book->authors()->attach($request->author_id);
        //
        return back()->with('msg', trans('site.msg_c'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
        $authors = $this->author->all();
        $categories = $this->category->all();
        $publishers = $this->publisher->all();
        //
        return view('admin.books.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookRequest $request, book $book)
    {
        //

        //
        $data = $request->validated();
        if ($request->has('cover_image')) {
            # code...
            Storage::disk('public')->delete($book->cover_image);
            $data['cover_image'] = $this->uploadImage($request->cover_image);
        }
        //
        $this->book = $book->find($book->id)->update($data);
        //
        $book->authors()->detach();
        $book->authors()->attach($request->author_id);
        //
        return back()->with('msg', trans('site.msg_u'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        Storage::disk('public')->delete($book->cover_image);
        //
        $this->book->find($book->id)->delete();
        //
        return back()->with('msg', trans('site.msg_d'));
    }
    //
    public function details(Book $book)
    {
        # code...
        return view('books.details', compact('book'));
    }
    //
    public function rate(Request $request, Book $book)
    {
        # code...
        if (auth()->user()->rated($book)) {
            # code...
            $rating = $this->rating->where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first();
            $rating->value = $request->value;
            $rating->save();
        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->book_id = $book->id;
            $rating->value = $request->value;
            $rating->save();
        }
        return back();
    }
}
