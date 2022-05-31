@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('site.books_gallery') }}</div>
                    <div class="card-body">
                        <div class="row justify-content-center my-1">
                            <form method="GET" action="{{ route('search') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-end" name="trem" id="trem"
                                        style="border-top-left-radius: 0%;border-bottom-left-radius: 0%"
                                        placeholder="أبحث بإسم الكتاب أو جزء منه">
                                    <button class="input-group-text rounded-start"
                                        style="border-top-right-radius: 0%;border-bottom-right-radius: 0%"
                                        type="submit">ابحث</button>
                                </div>
                            </form>
                        </div>
                        <hr class="mb-1">
                        <br class="my-1">
                        <h3 class="my-1">{{ $title }}</h3>
                        <div class="row">
                            @if ($books->count())
                                @foreach ($books as $book)
                                    @if ($book->number_of_copies > 0)
                                        <div class="col-lg-4 col-6 mb-3">
                                            <div class="d-block md-2 h-100 border rounded p-1">
                                                <a href="{{ route('book.details', $book->id) }}">
                                                    <img src="{{ Str::contains($book->cover_image, ['placeholder.com']) ? $book->cover_image : asset('storage/' . $book->cover_image) }}"
                                                        class="img-fluid thumbnail">
                                                </a>
                                                <b>
                                                    <a href="{{ route('book.details', $book->id) }}"
                                                        class="text-black">
                                                        <p class="p-0 m-0 pt-2">{{ $book->title }}</p>
                                                    </a>
                                                </b>
                                                @include('inc.ratings')
                                                @if ($book->category != null)
                                                    <a href="{{ route('gallery.categories.show', $book->category) }}"
                                                        style="color:grey">{{ $book->category->name }}</a> <br>
                                                @endif
                                                @if ($book->authors->isNotEmpty())
                                                    <b>{{ __('site.composing') }}</b>
                                                    @foreach ($book->authors as $author)
                                                        {{ $loop->first ? ' ' : 'و' }}
                                                        <a href="{{ route('gallery.authors.show', $author) }}"
                                                            style="color: grey">{{ $author->name }}</a> <br>
                                                    @endforeach
                                                @endif
                                                {{ __('site.price') }} : <b>{{ $book->price }} $</b>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="w3-center my-3">
                                    <div class="d-inline-block">
                                        {{ $books->links() }}
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ __('site.no_results') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
