@extends('main')

@section('title', 'Главная')

@section('header')
    @include('menu')
@endsection

@section('content')
	<div class="container my-3">
        <div class="card shadow-lg p-2 mb-1">
		<div class="row">
			<h2>Сон</h2>
		</div>
		<div class="row row-cols-2 mb-2">
			<div class="col">
                <form action="{{route('sleep.store')}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Начало</button>
                </form>
			</div>
            @if(!empty($sleep->sleep_start_at))
			<div class="col">
                <form action="{{route('sleep.update', $sleep)}}" method="post">
                    @csrf
                    @method('patch')
                    <button class="btn btn-warning" type="submit" @if(!empty($sleep->sleep_finish_at)) disabled @endif>Конец</button>
                </form>
			</div>
            @endif
        </div>
            <div class="row">
                @if(!empty($sleep->sleep_start_at))
                <div class="col">
                    <input class="form-control form-control-sm" name="sleep_start_at" value="{{$sleep->sleep_start_at}}" readonly>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm" name="sleep_finish_at" value="{{$sleep->sleep_finish_at}}" readonly>
                </div>
                @endif
            </div>
        </div>
        <div class="card shadow-lg p-2 mb-1">
		<div class="row">
			<h2>Кормление</h2>
		</div>
        <div class="row row-cols-2 mb-2">
            <div class="col">
                <form action="{{route('eat.store')}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Начало</button>
                </form>
            </div>
            @if(!empty($eat->eat_start_at))
                <div class="col">
                    <form action="{{route('eat.update', $eat)}}" method="post">
                        @csrf
                        @method('patch')
                        <button class="btn btn-warning" type="submit" @if(!empty($eat->eat_finish_at)) disabled @endif>Конец</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="row">
            @if(!empty($eat->eat_start_at))
                <div class="col">
                    <input class="form-control form-control-sm" name="eat_start_at" value="{{$eat->eat_start_at}}" readonly>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm" name="eat_finish_at" value="{{$eat->eat_finish_at}}" readonly>
                </div>
            @endif
        </div>
        </div>
        <div class="card shadow-lg p-2 mb-1">
		<div class="row">
			<h2>Прогулка</h2>
		</div>
        <div class="row row-cols-2 mb-2">
            <div class="col">
                <form action="{{route('walk.store')}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Начало</button>
                </form>
            </div>
            @if(!empty($walk->walk_start_at))
                <div class="col">
                    <form action="{{route('walk.update', $walk)}}" method="post">
                        @csrf
                        @method('patch')
                        <button class="btn btn-warning" type="submit" @if(!empty($walk->walk_finish_at)) disabled @endif>Конец</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="row">
            @if(!empty($walk->walk_start_at))
                <div class="col">
                    <input class="form-control form-control-sm" name="eat_start_at" value="{{$walk->walk_start_at}}" readonly>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm" name="eat_finish_at" value="{{$walk->walk_finish_at}}" readonly>
                </div>
            @endif
        </div>
        </div>
        <div class="row d-lg-none pt-2">
            <div class="col">
                <a class="btn btn-sm btn-primary col-12 shadow-lg" href="{{route('report.index')}}">ОБЩИЙ ОТЧЕТ</a>
            </div>
        </div>
	</div>
@endsection
