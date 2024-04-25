@extends('layouts.main')
@section("title","Добавление блюда")

@section("content")
<h1>Добавление блюда</h1>

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
    @endif
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Название:</strong>
    <input type="text" name="name" class="form-control"
    value="{{old('name')}}" placeholder="Название">
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Описание:</strong>
    <textarea name="description" class="form-control"
    value="{{old('description')}}" placeholder="Описание"></textarea>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Цена:</strong>
    <input type="text" name="price" class="form-control"
    value="{{old('price')}}" placeholder="Цена">
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Карточка</strong>
            <input type="file" name="card" class="form-control">
        </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Категория блюда</strong>
    <select name="id_menu_category" id="id_menu_category">
        @foreach($menuCategories as $menuCategory)
            <option value="{{$menuCategory->id}}">{{$menuCategory->category}}</option>
        @endforeach
    </select>
  
    </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Добавить блюдо</button>
 </div>
 </div>
 </form>
 </div>
 @endsection