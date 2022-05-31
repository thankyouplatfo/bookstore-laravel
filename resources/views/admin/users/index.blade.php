@extends('theme.default')
@section('title')
    - {{ __('site.users') }}
@endsection
@section('msg')
    <strong>{{ Session::get('msg') }}</strong>
@endsection
@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    <hr>
    <div class="w3-responsive">
        <table class="w3-table-all">
            <tr>
                <th class="w3-center">#</th>
                <th class="w3-center">الإسم</th>
                <th class="w3-center">البريد الإلكتروني</th>
                <th class="w3-center">مستوى الصلاحية</th>
                <th class="w3-center">تعديل الصلاحية</th>
                <!---->
                <th class="w3-center">تحرير</th>
                <th class="w3-center">حذف</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td class="w3-center">{{ $user->id }}</td>
                    <td class="w3-center"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    </td>
                    <!---->
                    <td class="w3-center">{{ $user->name }}</td>
                    <td class="w3-center">
                        <b class="w3-text-red w3-large" style="font-family: monospace!important">
                            {{ $user->isSuperAdmin() ? 'مدير عام' : ($user->isAdmin() ? 'مدير' : 'مستخدم') }}
                        </b>
                    </td>
                    <td>
                        @if (auth()->user() != $user)
                            <form method="POST" action="{{ route('users.update', $user->id) }}">@csrf
                                @method('PUT')
                                <select class="w3-input a_level" name="a_level" id="a_level" form="upd-user">
                                    <option value="0">مستخدم</option>
                                    <option value="1">مدير</option>
                                    <option value="2">مدير عام</option>
                                </select>
                                <button type="submit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                        @else
                            <select class="w3-input a_level" name="a_level" id="a_level" onchange="this.form.submit()"
                                form="upd-user" disabled>
                                <option value="0">مستخدم</option>
                                <option value="1">مدير</option>
                                <option value="2">مدير عام</option>
                                
                            </select>
                        @endif
                    </td>
                    <!---->
                    <td class="w3-center">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="w3-center">
                        @if (auth()->user() != $user)
                            <button type="submit" class="btn btn-danger" form="del-user"
                                onclick="return confirm('هل أنت متأكد ؟')"><i class="fa-solid fa-trash"></i></button>
                        @else
                            <button type="submit" class="btn btn-danger" form="del-user"
                                onclick="return confirm('هل أنت متأكد ؟')" disabled><i
                                    class="fa-solid fa-trash"></i></button>
                        @endif
                    </td>
                </tr>

                <form method="POST" action="{{ route('users.update', $user->id) }}" id="upd-user">@csrf
                    @method('PUT')
                </form>
            @endforeach
        </table>
    </div>
@endsection
@section('paginate')
    {{ $users->links() }}
@endsection
