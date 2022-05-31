@extends('theme.default')
@section('title')
    - {{ __('site.users_c') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <form action="{{ route('users.store') }}" method="post" class="w3-row-padding" enctype="multipart/form-data">
        @csrf
        <p class="w3-col w3-right">
            <label class="w3-large" for="name">الإسم</label>
            <input class="w3-input w3-large name" name="name" id="name" type="text" value="{{ old('name') }}">
            @error('name')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col w3-right">
            <label class="w3-large" for="address">الوصف</label>
            <textarea class="w3-input w3-large address" name="address" id="address" cols="30" rows="10">{{ old('address') }}</textarea>
            @error('address')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <!---->
        <p class="w3-col w3-left">
            <input class="btn btn-primary" type="submit" value="إضافة كتاب">
        </p>
    </form>
@endsection
