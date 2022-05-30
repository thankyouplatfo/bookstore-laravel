@extends('theme.default')
@section('title')
    - {{ __('site.book_u') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <div class="w3-center">
        <img id="cover-image-thumb" class="w3-border w3-circle"
            src="{{ Str::contains($book->cover_image, ['placeholder.com']) ? $book->cover_image : asset('storage/' . $book->cover_image) }}"
            width="320" height="320">
    </div>
    <form action="{{ route('books.update', $book->id) }}" method="post" class="w3-row-padding"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p class="w3-col w3-right">
            <label class="w3-large" for="author_id">المؤلفـ/ون</label>
        <ul class="w3-ul w3-row-padding w3-section">
            @foreach ($authors as $author)
                {!! $book->authors->contains($author) ? '<li class="w3-col l4 w3-right w3-border-bottom">' . $author->name . '</li>' : '' !!}
            @endforeach
        </ul>
        <select class="w3-input w3-large author_id " name="author_id[]" id="author_id" multiple>
            {{--  --}}
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $book->authors->contains($author) ? 'selected' : '' }}>
                    {{ $author->name }}</option>
            @endforeach
        </select>

        @error('author_id')
            <b class="err">{{ $message }}</b>
        @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="category_id">الفئة</label>
            {{-- $book->category == null ? 'selected' : '' --}}
            <select class="w3-input w3-large category_id" name="category_id" id="category_id">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $book->category == $cat ? 'selected' : '' }}>
                        {{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="publisher_id">الناشر</label>
            <select class="w3-input w3-large publisher_id" name="publisher_id" id="publisher_id">
                @foreach ($publishers as $pub)
                    <option value="{{ $pub->id }}" {{ $book->publisher == $pub ? 'selected' : '' }}>
                        {{ $pub->name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="title">العنوان</label>
            <input class="w3-input w3-large title" name="title" id="title" type="text" value="{{ $book->title }}">
            @error('title')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="isbn">الرقم التسلسلي</label>
            <input class="w3-input w3-large isbn" name="isbn" id="isbn" type="text" value="{{ $book->isbn }}">
            @error('isbn')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col w3-right">
            <label class="w3-large" for="desc">الوصف</label>
            <textarea class="w3-input w3-large desc" name="desc" id="desc" cols="30" rows="10">{{ $book->desc }}</textarea>
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
                value="{{ $book->number_of_pages }}" min="1">
            @error('number_of_pages')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="number_of_copies">عدد النسخ</label>
            <input class="w3-input w3-large number_of_copies" name="number_of_copies" id="number_of_copies" type="number"
                value="{{ $book->number_of_copies }}" min="1">
            @error('number_of_copies')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l3 w3-right">
            <label class="w3-large" for="price">سعر</label>
            <input class="w3-input w3-large price" name="price" id="price" type="number" value="{{ $book->price }}"
                min="1">
            @error('price')
                <b class="err">{{ $message }}</b>
            @enderror
        </p>
        <p class="w3-col l12 w3-right">
            <label class="w3-large" for="cover_image">صورة الغلاف</label>
            <input class="w3-input w3-large cover_image" name="cover_image" id="cover_image" type="file"
                value="{{ $book->cover_image }}" accept="image/*" onchange="readCoverImage(this);">
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
