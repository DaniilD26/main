@extends("layouts.main")
@section("title","Панель админа")
@section('content')
<div class="container">
 
<h1>Административная панель</h1>
<h3>Привет, {{ Auth::user()->login }}!</h3>
</div>
@endsection