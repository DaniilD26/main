@extends("layouts.main")
@section("title","Информация о блюде")
@section('content')
    <div class="container">
    
        <div class="card" style="width: 30rem;">
            <img src="{{ asset('storage/'.$menu->card) }}" class="card-img-top" alt="Картинка">
            <img src="{{ asset('storage/default.png') }}" class="card-img-top" alt="Картинка">
           
            <div class="card-body">
                <h5 class="card-title"></h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Название <b>{{ $menu->name }}</b></li>
                    <li class="list-group-item">Описание <b>{{ $menu->description }}</b></li>
                    <li class="list-group-item">Цена <b>{{ $menu->price }}</b></li>
                    <li class="list-group-item">Категория <b>{{ $menu->menuCategory->category }}</b></li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('menu.edit', $menu->id) }}" class="card-link">Редактировать данные</a>
                </div>
            </div>
            <div class="back"><a href="{{ route('menu.index') }}" class="link">Назад</a></div>
        </div> 
    </div>
@endsection
