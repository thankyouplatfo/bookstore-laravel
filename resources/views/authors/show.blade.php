@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('site.glossary_of_the_author_s_books') }}</h1>
                    </div>
                    <div class="card-body">
                        <h3 class="my-3">{{ $title }}</h3>
                        <div class="row">
                            @if ($books->count())
                                @foreach ($books as $book)
                                    @if ($book->number_of_copies > 0)
                                        <div class="col-lg-4 col-6 mb-3">
                                            <div class="d-block md-2 h-100 border rounded p-1">
                                                <a href="{{ route('book.show', $book->id) }}">
                                                    <img src="{{ Str::contains($book->cover_image, ['placeholder.com']) ? $book->cover_image : asset('storage/' . $book->cover_image) }}"
                                                        class="img-fluid thumbnail">
                                                </a>
                                                <b>
                                                    <a href="{{ route('book.show', $book->id) }}" class="text-black">
                                                        <p class="p-0 m-0 pt-2">{{ $book->title }}</p>
                                                    </a>
                                                </b>
                                                @if ($book->category != null)
                                                    <a href="{{ route('categories.show', $book->category) }}"
                                                        style="color:grey">{{ $book->category->name }}</a><br>
                                                @endif
                                                @if ($book->authors->isNotEmpty())
                                                    <b>{{ __('site.composing') }}</b>
                                                    @foreach ($book->authors as $author)
                                                        {{ $loop->first ? ' ' : 'و' }}
                                                        <a href="{{ route('authors.show', $author) }}"
                                                            style="color: grey">{{ $author->name }}</a> <br>
                                                    @endforeach
                                                @endif
                                                {{ __('site.price') }} : <b>{{ $book->price }} $</b>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
