@extends('layouts.main')
@section("title","Форма регистрации")

@section("content")
<h1>Регистрация сотрудников</h1>

</body>
</html>

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
 <form action="{{ route('register.store') }}" method="POST">
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
    <strong>роль</strong>
    <select name="id_role" id="id_role">
        <option value="1">Администратор</option>
        <option value="2">Официант</option>
        <option value="3">Повар</option>
    </select>
    <input type="text" name="id_role" class="form-control"
   placeholder="1-админ, 2-официант, 3-повар"><!-- was role_id -->
    </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
 </div>
 </div>
 </form>
 </div>
 @endsection