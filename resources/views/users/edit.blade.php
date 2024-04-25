@extends('layouts.main')
@section("title","Редактирование пользователя")

@section("content")
<h1>Редактирование информации</h1>

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
 <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
 @csrf
 @method('patch')
 <div class="row">

 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Логин:</strong>
 <input type="text" name="login" class="form-control"
 value="{{ $user->login }}" placeholder="Логин">
 </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Имя:</strong>
    <input type="text" name="name" class="form-control"
    value="{{ $user->name }}" placeholder="Логин">
    </div>
    </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Фамилия:</strong>
 <input type="text" name="lastname" class="form-control"
 value="{{ $user->lastname }}" placeholder="Фамилия">
 </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Телефон:</strong>
    <input type="text" name="phone" class="form-control"
    value="{{ $user->phone }}" placeholder="Телефон">
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Возраст:</strong>
        <input type="text" name="age" class="form-control"
        value="{{ $user->age }}" placeholder="Возраст">
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Аватар:</strong>
            <input type="file" name="avatar" class="form-control"
            value="{{ $user->avatar }}">
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Опыт работы:</strong>
                <input type="text" name="work_experience" class="form-control"
                value="{{ $user->work_experience }}" placeholder="Опыт работы">
                </div>
                </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Статус</strong>
    <select name="id_status" id="id_status">
        @foreach($statuses as $status)
            <option 
            {{$status->id === $user->id_status ? 'selected' : ''}}
            value="{{$status->id}}">{{$status->status}}</option>
        @endforeach
    </select>
    </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Обновить</button>
 </div>
 </div>
 </form>
 </div>
 @endsection