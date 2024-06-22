@extends("layouts.main")
@section("title","Вывод пользователей")
@section("content")
    <div><a href="{{route('menu.create')}}">Добавить новое блюдо</a></div>
        <table class="table table-striped">
            <tr>
                <td>id</td>
                <td>название</td>
                <td>Описание</td>
                <td>Цена</td>
                <td>подробнее</td>
                <td>Удалить</td>
            </tr>
            @foreach($menu as $menu)
                <tr>
                    <td>{{$menu->id}}</td>
                    <td>{{$menu->name}}</td>
                    <td>{{$menu->description}}</td>
                    <td>{{$menu->price}} руб.</td>
                    <td><a href="{{route('menu.show', $menu)}}">Подробнее</a></td>
                    <td>
                        {{-- <a href="{{route('menu.destroy', $menu->id)}}">Удалить</a> --}}
                        <form method="POST" action="{{route('menu.destroy', $menu->id)}}"  enctype="multipart/form-data">
                            @csrf {{-- Встраиваем CSRF-токен --}}
                            @method('DELETE') {{-- Указываем метод DELETE --}}
                            <button type="submit">Удалить блюдо</button>
                        </form>
                    
                    </td>
                </tr>
            @endforeach
        </table>
@endsection
