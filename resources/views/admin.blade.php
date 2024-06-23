@extends("layouts.main")
@section("title","Панель админа")
@section('content')
<div class="container">
 
<h1>Административная панель</h1>
<h3>Привет, {{ Auth::user()->login }}!</h3>
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
</div>

</div>
@endsection