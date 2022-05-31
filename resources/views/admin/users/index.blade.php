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
                            <select class="w3-input admin_level" name="admin_level" id="admin_level" form="admi-level-edit"
                                onchange="this.form.submit()">
                                <option value="0" {{ $user->admin_level === 0 ? 'selected' : '' }}>مستخدم</option>
                                <option value="1" {{ $user->admin_level === 1 ? 'selected' : '' }}>مدير</option>
                                <option value="2" {{ $user->admin_level === 2 ? 'selected' : '' }}>مدير عام</option>
                            </select>
                            {{-- <button type="submit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button> --}}
                        @else
                            <select class="w3-input admin_level" name="admin_level" id="admin_level" form="upd-user"
                                disabled>
                                <option value="0" {{ $user->admin_level === 0 ? 'selected' : '' }}>مستخدم</option>
                                <option value="1" {{ $user->admin_level === 1 ? 'selected' : '' }}>مدير</option>
                                <option value="2" {{ $user->admin_level === 2 ? 'selected' : '' }}>مدير عام</option>
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
                            <button type="submit" class="btn btn-danger" form="del-user{{ $user->id }}"
                                onclick="return confirm('هل أنت متأكد ؟')"><i class="fa-solid fa-trash"></i></button>
                        @else
                            <button type="submit" class="btn btn-danger" form="del-user{{ $user->id }}"
                                onclick="return confirm('هل أنت متأكد ؟');this.form.submit()" disabled><i
                                    class="fa-solid fa-trash"></i></button>
                        @endif
                    </td>
                </tr>
                <form method="POST" action="{{ route('users.update', $user->id) }}" id="upd-user">
                    @csrf
                    @method('PUT')
                </form>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" id="del-user{{ $user->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </table>
    </div>
@endsection
@section('paginate')
    {{ $users->links() }}
@endsection
