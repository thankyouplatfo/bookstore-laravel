@extends('theme.default')
@section('title')
    - {{ __('site.authors') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <a href="{{ route('authors.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    <hr>
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th class="w3-center">#</th>
                <th class="w3-center">الإسم</th>
                <th class="w3-center">الوصف</th>
                <!---->
                <th class="w3-center">تحرير</th>
                <th class="w3-center">حذف</th>
            </tr>
            @foreach ($authors as $author)
                <tr>
                    <td class="w3-center">{{ $author->id }}</td>
                    <td class="w3-center"><a href="{{ route('gallery.authors.show',$author->id) }}">{{ $author->name }}</a>
                    </td>
                    <!---->
                    <td class="w3-center">{{ Str::limit($author->desc, 125, '...') }}</td>
                    <!---->
                    <td class="w3-center">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="w3-center">
                        <button type="submit" class="btn btn-danger" form="del-author" onclick="return confirm('هل أنت متأكد ؟')"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <form method="POST" action="{{ route('authors.destroy', $author->id) }}" id="del-author">@csrf
                    @method('DELETE')
                </form>
            @endforeach
        </table>
    </div>
@endsection
@section('paginate')
    {{ $authors->links() }}
@endsection
