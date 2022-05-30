@extends('theme.default')
@section('title')
    - {{ __('site.category_u') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="post" class="w3-row-padding"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p class="w3-col w3-right">
            <label class="w3-large" for="name">الإسم</label>
            <input class="w3-input w3-large name" name="name" id="name" type="text" value="{{ $category->name }}">
            @error('name')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col w3-right">
            <label class="w3-large" for="desc">الوصف</label>
            <textarea class="w3-input w3-large desc" name="desc" id="desc" cols="30" rows="10">{{ $category->desc }}</textarea>
            @error('desc')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <!---->
        <p class="w3-col w3-left">
            <input class="btn btn-primary" type="submit" value="إضافة كتاب">
        </p>
    </form>
@endsection
