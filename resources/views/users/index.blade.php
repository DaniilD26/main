@extends("layouts.main")
@section("title","Вывод пользователей")
@section("content")
        <table class="table table-striped">
            <tr>
                <td>id</td>
                <td>login</td>
                <td>Роль</td>
                <td>Статус</td>
                <td>подробнее</td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->login}}</td>
                    <td>{{$user->role->role}}</td>
                    <td>{{$user->status->status}}</td>
                    <td><a href="{{route('users.show', $user->id)}}">Подробнее</a></td>
                </tr>
            @endforeach
        </table>
        {{ $users->links() }}
@endsection
