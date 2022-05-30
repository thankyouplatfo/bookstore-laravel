@extends('theme.default')
@section('content')
    <div class="w3-row-padding w3-margin-bottom mt-0">
        <div class="w3-col w3-right my-3 w3-hi">
            <div class="w3-round w3-container w3-rightbar w3-card-4 w3-text-black w3-border-red w3-padding-16">
                <div class="w3-left"><i class="w3-xxxlarge fa-solid fa-user"></i></div>
                <div class="w3-right">
                    <h3>{{ $users }}</h3>
                </div>
                <div class="w3-clear"></div>
                <a href="{{ route('users.index') }}">
                    <h4>{{ __('site.users') }}</h4>
                </a>
            </div>
        </div>
        <div class="w3-quarter w3-right">
            <div class="w3-round w3-container w3-rightbar w3-card-4 w3-text-black w3-border-green w3-padding-16">
                <div class="w3-left"><i class="w3-xxxlarge fa-solid fa-pencil"></i></div>
                <div class="w3-right">
                    <h3>{{ $authors }}</h3>
                </div>
                <div class="w3-clear"></div>
                <a href="{{ route('authors.index') }}">
                    <h4>{{ __('site.authors') }}</h4>
                </a>
            </div>
        </div>
        <div class="w3-quarter w3-right">
            <div class="w3-round w3-container w3-rightbar w3-card-4 w3-text-black w3-border-yellow w3-padding-16">
                <div class="w3-left"><i class="w3-xxxlarge fa-solid fa-book"></i></div>
                <div class="w3-right">
                    <h3>{{ $books }}</h3>
                </div>
                <div class="w3-clear"></div>
                <a href="{{ route('books.index') }}">
                    <h4>{{ __('site.books') }}</h4>
                </a>
            </div>
        </div>
        <div class="w3-quarter w3-right">
            <div class="w3-round w3-container w3-rightbar w3-card-4 w3-text-black w3-border-blue w3-padding-16">
                <div class="w3-left"><i class="w3-xxxlarge fa-solid fa-puzzle-piece"></i></div>
                <div class="w3-right">
                    <h3>{{ $categories }}</h3>
                </div>
                <div class="w3-clear"></div>
                <a href="{{ route('categories.index') }}">
                    <h4>{{ __('site.categories') }}</h4>
                </a>
            </div>
        </div>
        <div class="w3-quarter w3-right">
            <div
                class="w3-round w3-container w3-rightbar w3-card-4 w3-text-black w3-border-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="w3-xxxlarge fa-solid fa-upload"></i></div>
                <div class="w3-right">
                    <h3>{{ $publishers }}</h3>
                </div>
                <div class="w3-clear"></div>
                <a href="{{ route('publishers.index') }}">
                    <h4>{{ __('site.publishers') }}</h4>
                </a>
            </div>
        </div>
    </div>
@endsection
