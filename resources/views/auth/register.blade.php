@extends('main')

@section('title', 'Регистрация')

@section('header')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="container p-3">
            <div class="card shadow-lg">
        <div class="card-header">
                <h4 class="d-inline-block">Регистрация</h4>
        </div>
                <div class="card-body">
        <form action="/register" method="post">
            @csrf
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-2">
                <label for="name" class="form-label">Имя</label>
                <input value="{{old('name')}}" required autofocus class="form-control form-control-sm" name="name"  type="text" placeholder="Анна">
                @error('name')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col mb-2">
                <label for="email" class="form-label">Почта</label>
                <input value="{{old('email')}}" required class="form-control form-control-sm" name="email"  type="email" placeholder="mail@mail.ru">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-2">
                <label for="password" class="form-label">Пароль</label>
                <input required class="form-control form-control-sm" name="password"  type="password">
                @error('password')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col mb-2">
                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                <input required class="form-control form-control-sm" name="password_confirmation"  type="password">
                @error('password_confirmation')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row pt-3">
            <div class="col">
                <button class="btn btn-sm btn-danger col-12" type="submit">Сохранить</button>
            </div>
            <div class="col">
                <a class="btn btn-sm btn-outline-success col-12" href="{{route('login')}}" >Войти</a>
            </div>
        </div>
        </form>
        </div>
    </div>
    </div>
    </div>
@endsection



