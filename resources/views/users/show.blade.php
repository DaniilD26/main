@extends("layouts.main")
@section("title","Профиль пользователя")
@section('content')
    <div class="container">
    
        <div class="card" style="width: 30rem;">
            <img src="{{ asset('storage/'.$user->avatar) }}" class="card-img-top" alt="Картинка">

            <div class="card-body">
                <h5 class="card-title">Профиль</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Логин: <b>{{ $user->login }}</b></li>           
                <li class="list-group-item">Имя: <b>{{ $user->name }}</b></li>
                <li class="list-group-item">Фамилия: <b>{{ $user->lastname }}</b></li>
                <li class="list-group-item">Телефон: <b>{{ $user->phone }}</b></li>
                <li class="list-group-item">Возраст: <b>{{ $user->age }}</b></li>
                <li class="list-group-item">Роль: <b>{{ $user->role->role }}</b></li>
                <li class="list-group-item">Статус работника: <b>{{ $user->status->status }}</b></li>
</ul>
                 <div class="card-body">
                   <a href="{{route('users.edit', $user->id)}}" class="card-link">Редактировать данные</a>
                    </div>
        </div>
        <div class="back"><a href="{{route('users.index')}}" class="link">Назад</a></div>
    </div>
@endsection
