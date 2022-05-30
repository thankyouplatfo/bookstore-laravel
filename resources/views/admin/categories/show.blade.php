@extends('theme.default')
@section('title')
    - تفاصيل الكتاب
@endsection
@section('content')
    <div class="w3-clear">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{ __('site.category_details') }}</h1>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @if ($category->number_of_copies > 0)
                                    <div class="col-lg-10">
                                        <div class="d-block md-2 h-100 border rounded p-1">
                                            <a href="{{ route('book.details', $category->id) }}">
                                                <img src="{{ Str::contains($category->cover_image, ['placeholder.com']) ? $category->cover_image : asset('storage/' . $category->cover_image) }}"
                                                    class="img-fluid thumbnail col-sm-12">
                                            </a>
                                            <b class="3">
                                                <h2 class="text-center w3-xxlarge">{{ $category->title }}</h2>
                                            </b>
                                            <ul class="w3-ul">
                                                <span class="d-block my-5">
                                                    @if ($category->authors->isNotEmpty())
                                                        <li>
                                                            <b class="5">{{ __('site.composing') }}</b>
                                                            @foreach ($category->authors as $author)
                                                                {{ $loop->first ? ' ' : 'و' }}
                                                                <a href="#">{{ $author->name }}</a>
                                                            @endforeach
                                                        </li>
                                                    @endif
                                                    <li class="w3-border-bottom"><b>الفئة: </b>
                                                        {{ $category->category->name }}
                                                    </li>
                                                    <li class="w3-border-bottom"><b>الناشر: </b>
                                                        {{ $category->publisher->name }}
                                                    </li>
                                                    @if ($category->isbn > 0)
                                                        <li class="w3-border-bottom"><b>الرقم العالمي الموحد للكتاب: </b>
                                                            {{ $category->isbn }}</li>
                                                    @endif
                                                    <li class="w3-border-bottom"><b>الوصف: </b> {{ $category->desc }}
                                                    </li>
                                                    <li class="w3-border-bottom w3-center"><b class="w3-block">تاريخ
                                                            ووقت
                                                            النشر: </b>
                                                        <span class="d-inline-block"
                                                            dir="ltr">{{ $category->publish_year }}</span>
                                                        <span
                                                            class="d-block">{{ $category->created_at->diffForHumans() }}</span>
                                                    </li>
                                                    <li class="w3-border-bottom"><b>عدد الصفحات: </b>
                                                        {{ $category->number_of_pages }}</li>
                                                    <li class="w3-border-bottom"><b>عدد النسخ: </b>
                                                        {{ $category->number_of_copies }}
                                                    </li>
                                                    <li>
                                                        <h3 class="w3-xxxlarge text-danger text-center">
                                                            {{ $category->price }} $
                                                        </h3>
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
    </div>
@endsection
