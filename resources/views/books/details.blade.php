@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="height: 50vh!important">
            <div class="col-md-8" style="height: 100%!important">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('site.books_details') }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @if ($book->number_of_copies > 0)
                                <div class="col-lg-8">
                                    <div class="d-block md-2 h-100 border rounded p-1">


                                        <a href="{{ route('book.details', $book->id) }}">
                                            <img src="{{ Str::contains($book->cover_image, ['placeholder.com']) ? $book->cover_image : asset('storage/' . $book->cover_image) }}"
                                                class="img-fluid thumbnail col-sm-12">
                                        </a>
                                        <b class="3">
                                            <h2 class="text-center w3-xxlarge">{{ $book->title }}</h2>
                                        </b>
                                        <ul class="w3-ul">
                                            <span class="d-block my-5">
                                                @if ($book->authors->isNotEmpty())
                                                    <li>
                                                        <b class="5">{{ __('site.composing') }}</b>
                                                        @foreach ($book->authors as $author)
                                                            {{ $loop->first ? ' ' : 'و' }}
                                                            <a href="#">{{ $author->name }}</a>
                                                        @endforeach
                                                    </li>
                                                @endif
                                                <li class="w3-border-bottom"><b>الفئة: </b> {{ $book->category->name }}
                                                </li>
                                                <li class="w3-border-bottom"><b>الناشر: </b> {{ $book->publisher->name }}
                                                </li>
                                                @if ($book->isbn > 0)
                                                    <li class="w3-border-bottom"><b>الرقم العالمي الموحد للكتاب: </b>
                                                        {{ $book->isbn }}</li>
                                                @endif
                                                <li class="w3-border-bottom"><b>الوصف: </b> {{ $book->desc }}</li>
                                                <li class="w3-border-bottom w3-center"><b class="w3-block">تاريخ ووقت
                                                        النشر: </b>
                                                    <span class="d-inline-block"
                                                        dir="ltr">{{ $book->publish_year }}</span>
                                                    <span
                                                        class="d-block">{{ $book->created_at->diffForHumans() }}</span>
                                                </li>
                                                <li class="w3-border-bottom"><b>عدد الصفحات: </b>
                                                    {{ $book->number_of_pages }}</li>
                                                <li class="w3-border-bottom"><b>عدد النسخ: </b>
                                                    {{ $book->number_of_copies }}
                                                </li>
                                                <li class="w3-border-bottom">
                                                    <b>تقييمات المستخدمين: </b>
                                                    @include('inc.ratings')
                                                </li>
                                                <li>
                                                    <h3 class="w3-xxxlarge text-danger text-center">{{ $book->price }} $
                                                    </h3>
                                                </li>
                                                <li>
                                                    @include('inc.rating')
                                                </li>
                                            </span>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
