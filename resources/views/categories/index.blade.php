@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h1>{{ __('site.categories') }}</h1></div>

                <div class="card-body">                  
                    <div class="row justify-content-center my-1">
                        <form method="GET" action="{{ route('gallery.categories.search') }}">
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
                    <ol start="1" class="w3-ul">
                        @foreach ($categories as $cat)
                            <li class="card-subtitle"><a href="{{ route('gallery.categories.show',$cat->id) }}">{{ $cat->name }}</a> - ({{ count($cat->books) }})</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
