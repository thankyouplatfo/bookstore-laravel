@extends('theme.default')
@section('title')
    - {{ __('site.publisher_u') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
@section('content')
    <form action="{{ route('categories.update', $publisher->id) }}" method="post" class="w3-row-padding"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p class="w3-col w3-right">
            <label class="w3-large" for="name">الإسم</label>
            <input class="w3-input w3-large name" name="name" id="name" type="text" value="{{ $publisher->name }}">
            @error('name')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col w3-right">
            <label class="w3-large" for="desc">العنوان</label>
            <textarea class="w3-input w3-large desc" name="desc" id="desc" cols="30" rows="10">{{ $publisher->address }}</textarea>
            @error('desc')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <!---->
        <p class="w3-col w3-left">
            <input class="btn btn-primary" type="submit" value="تعديل  ناشر">
        </p>
    </form>
@endsection
