@extends('theme.default')
@section('title')
    - {{ __('site.book_c') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <div class="w3-center">
        <img id="cover-image-thumb" class="w3-border w3-circle" src="http://via.placeholder.com/600x600" width="320"
            height="320">
    </div>
    <form action="{{ route('books.store') }}" method="post" class="w3-row-padding" enctype="multipart/form-data">
        @csrf
        <p class="w3-col w3-right">
            <label class="w3-large" for="author_id">المؤلفـ/ون</label>
            <select class="w3-input w3-large author_id" name="author_id[]" id="author_id" multiple>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="category_id">الفئة</label>
            <select class="w3-input w3-large category_id" name="category_id" id="category_id">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="publisher_id">الناشر</label>
            <select class="w3-input w3-large publisher_id" name="publisher_id" id="publisher_id">
                @foreach ($publishers as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="title">العنوان</label>
            <input class="w3-input w3-large title" name="title" id="title" type="text" value="{{ old('title') }}">
            @error('title')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="isbn">الرقم التسلسلي</label>
            <input class="w3-input w3-large isbn" name="isbn" id="isbn" type="text" value="{{ Str::random(13) }}">
            @error('isbn')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col w3-right">
            <label class="w3-large" for="desc">الوصف</label>
            <textarea class="w3-input w3-large desc" name="desc" id="desc" cols="30" rows="10"></textarea>
            @error('desc')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="publish_year">تاريخ النشر</label>
            <input class="w3-input w3-large publish_year" name="publish_year" id="publish_year" dir="ltr"
                style="text-align: ltr!important" value="{{ Carbon\Carbon::now() }}">
            @error('publish_year')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="number_of_pages">عدد الصفحات</label>
            <input class="w3-input w3-large number_of_pages" name="number_of_pages" id="number_of_pages" type="number"
                value="{{ old('number_of_pages') }}" min="1">
            @error('number_of_pages')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="number_of_copies">عدد النسخ</label>
            <input class="w3-input w3-large number_of_copies" name="number_of_copies" id="number_of_copies" type="number"
                value="{{ old('number_of_copies') }}" min="1">
            @error('number_of_copies')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="price">سعر</label>
            <input class="w3-input w3-large price" name="price" id="price" type="number" value="{{ old('price') }}"
                min="1">
            @error('price')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l12 w3-right">
            <label class="w3-large" for="cover_image">صورة الغلاف</label>
            <input class="w3-input w3-large cover_image" name="cover_image" id="cover_image" type="file"
                value="{{ old('cover_image') }}" accept="image/*" onchange="readCoverImage(this);">
            @error('cover_image')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col w3-left">
            <input class="btn btn-primary" type="submit" value="إضافة كتاب">
        </p>
    </form>
@endsection
@section('script')
    <script>
        function readCoverImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cover-image-thumb')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
