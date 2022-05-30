@extends('theme.default')
@section('title')
    - {{ __('site.books_c') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    <hr>
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th class="w3-center">#</th>
                <th class="w3-center">العنوان</th>
                <th class="w3-center">الرقم التسلسلي</th>
                <th class="w3-center">الوصف</th>
                <th class="w3-center">سنة النشر</th>
                <th class="w3-center">عدد الصفحات</th>
                <th class="w3-center">عدد النسخ</th>
                <th class="w3-center">السعر</th>
                <th class="w3-center">الصورة</th>
                <th class="w3-center">الصنف</th>
                <th class="w3-center">المؤلف</th>
                <th class="w3-center">الناشر</th>
                <th class="w3-center">تحرير</th>
                <th class="w3-center">حذف</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td class="w3-center">{{ $book->id }}</td>
                    <td class="w3-center"><a href="{{ route('book.details', $book->id) }}">{{ $book->title }}</a>
                    </td>
                    <td class="w3-center">{{ $book->isbn }}</td>
                    <td class="w3-center">{{ $book->desc }}</td>
                    <td class="w3-center">{{ $book->publish_year }}</td>
                    <td class="w3-center">{{ $book->number_of_pages }}</td>
                    <td class="w3-center">{{ $book->number_of_copies }}</td>
                    <td class="w3-center">{{ $book->price }}</td>
                    <td class="w3-center"
                        style="background-image: url({{ Str::contains($book->cover_image, ['placeholder.com']) ? $book->cover_image : asset('storage/' . $book->cover_image) }});background-size:100% 100%">
                    </td>
                    <td class="w3-center">{{ $book->category->name != null ? $book->category->name : 'غير مصنف' }}
                    </td>
                    <td class="w3-center">
                        @if ($book->authors->count() > 0)
                            @foreach ($book->authors as $author)
                                {{ $loop->first ? ' ' : ' و' }}
                                {{ $author->name }}
                            @endforeach
                        @else
                        @endif
                    </td>
                    <td class="w3-center">
                        {{ $book->publisher->name != null ? $book->publisher->name : 'لا يوجد ناشر/ين' }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger" form="del-book"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <form method="POST" action="{{ route('books.destroy', $book->id) }}" id="del-book">@csrf @method('DELETE')
                </form>
            @endforeach
        </table>
    </div>
@endsection
@section('paginate')
    {{ $books->links() }}
@endsection
