@extends('layouts.main')
@section("title","Главная")
@section("content")
<div class="main-home">
    <div class="main-blok">
        <div class="main-blok-header">
            <h1 class="main-header">"Вкусно и удобно: Онлайн кафе Оазис"</h1>
            <a class="main-action" href="">Сделать заказ</a>
        </div>
            
        <div class="main-blok-image">
            <img class="imageMain" src="{{url('public/images/main2.jpg')}}" alt="image main">
        </div>
    </div>
    
    
</div>

@endsection
