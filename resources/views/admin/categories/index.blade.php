@extends('theme.default')
@section('title')
    - {{ __('site.categories') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
            @foreach ($categories as $category)
                <tr>
                    <td class="w3-center">{{ $category->id }}</td>
                    <td class="w3-center"><a href="{{ route('gallery.categories.show',$category->id) }}">{{ $category->name }}</a>
                    </td>
                    <!---->
                    <td class="w3-center">{{ Str::limit($category->desc, 125, '...') }}</td>
                    <!---->
                    <td class="w3-center">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="w3-center">
                        <button type="submit" class="btn btn-danger" form="del-category" onclick="return confirm('هل أنت متأكد ؟')"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <form method="POST" action="{{ route('categories.destroy', $category->id) }}" id="del-category">@csrf
                    @method('DELETE')
                </form>
            @endforeach
        </table>
    </div>
@endsection
@section('paginate')
    {{ $categories->links() }}
@endsection
