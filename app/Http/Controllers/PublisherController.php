<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use App\Http\Requests\StorepublisherRequest;
use App\Http\Requests\UpdatepublisherRequest;
use App\Traits\IncModelsTrait;
use Illuminate\Http\Request;

class PublisherController extends Controller
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
        $publishers = $this->publisher->orderBy('name', 'desc')->paginate(10);
        //
        $title = 'الناشرون';
        //
        return view('admin.publishers.index', compact('publishers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepublisherRequest $request)
    {
        //
        $this->publisher->create($request->all());
        //
        return back()->with('msg', trans('site.msg_c'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
        return view('gallery.publishers', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        //
        return view('admin.publishers.edit',compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepublisherRequest  $request
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepublisherRequest $request, publisher $publisher)
    {
        //
        $this->publisher->find($publisher->id)->update($request->all());
        //
        return back()->with('msg', trans('site.msg_u'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        //
        $this->publisher->find($publisher->id)->delete();
        //
        return back()->with('msg', trans('site.msg_d'));
    }
    //
    public function result(Publisher $publisher)
    {
        # code...
        //
        $books = $publisher->books()->paginate(10);
        //
        $title = ' الكتب التابعة للناشر:' . '   ' . $publisher->name;
        //
        return view('gallery', compact('books', 'title'));
    }
    //
    public function list(Publisher $publisher)
    {
        # code...
        $publishers = $publisher->all()->sortBy('name');
        //
        $title = 'التصنيفات';
        //
        return view('publishers.index', compact('publishers', 'title'));
    }
    //
    public function search(Request $request)
    {
        $publishers = publisher::where('name', 'like', "%{$request->trem}%")->get()->sortBy('name');
        //
        $title = ' نتائج البحث عن: ' . $request->trem;
        //
        return view('publishers.index', compact('publishers', 'title'));
    }
}
