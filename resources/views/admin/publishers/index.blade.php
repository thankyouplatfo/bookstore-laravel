@extends('theme.default')
@section('title')
    - {{ __('site.publishers') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <a href="{{ route('publishers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    <hr>
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th class="w3-center">#</th>
                <th class="w3-center">الإسم</th>
                <th class="w3-center">العنوان</th>
                <!---->
                <th class="w3-center">تحرير</th>
                <th class="w3-center">حذف</th>
            </tr>
            @foreach ($publishers as $publisher)
                <tr>
                    <td class="w3-center">{{ $publisher->id }}</td>
                    <td class="w3-center"><a href="{{ route('gallery.publishers.show',$publisher->id) }}">{{ $publisher->name }}</a>
                    </td>
                    <!---->
                    <td class="w3-center">{{ Str::limit($publisher->address, 125, '...') }}</td>
                    <!---->
                    <td class="w3-center">
                        <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="w3-center">
                        <button type="submit" class="btn btn-danger" form="del-publisher" onclick="return confirm('هل أنت متأكد ؟')"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <form method="POST" action="{{ route('publishers.destroy', $publisher->id) }}" id="del-publisher">@csrf
                    @method('DELETE')
                </form>
            @endforeach
        </table>
    </div>
@endsection
@section('paginate')
    {{ $publishers->links() }}
@endsection
