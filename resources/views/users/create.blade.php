@extends('layouts.main')
@section("title","Форма регистрации")

@section("content")
<h1>Регистрация сотрудников</h1>

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
 <form action="{{ route('users.store') }}" method="POST">
 @csrf
 <div class="row">

 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Логин:</strong>
 <input type="text" name="login" class="form-control"
value="{{old('login')}}" placeholder="Логин">
 </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Пароль:</strong>
 <input type="password" name="password" class="form-control"
placeholder="Пароль">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Подтверждение пароля:</strong>
 <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
placeholder="Подтвердите пароль">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>роль</strong>
    <select name="id_role" id="id_role">
        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->role}}</option>
        @endforeach
    </select>
    </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
 </div>
 </div>
 </form>
 </div>
 @endsection