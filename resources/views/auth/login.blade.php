@extends("layouts.main")
@section("title","Форма авторизации")
@section("content")
    <div class="container" style="width: 180px">
        <main class="form-signin w-100 m-auto">
            <form action="{{route('login.store')}}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Пожалуйста, авторизуйтесь</h1>

                <div class="form-floating">
                    <input type="text" name="login" value="{{ old('login') }}" class="form-control">
                    <label for="login">Login</label>
                    @error('login')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" value="{{old('password')}}" class="form-control">
                    <label for="password">Password</label>
                    @error('password')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Авторизоваться</button>
                <p class="mt-5 mb-3 text-body-secondary">© 2024</p>
            </form>
        </main>
    </div>
@endsection

