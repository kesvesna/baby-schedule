<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:title" content="">
	<meta property="og:type" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="">

	<link rel="stylesheet" href="{{asset('../assets/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('../assets/css/bootstrap.min.css')}}">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Режим ребенка</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{route('site.index')}}">Главная</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('report.index')}}">Отчет</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container my-3">
		<div class="row">
			<h2>Сон</h2>
		</div>
		<div class="row row-cols-2 mb-3">
			<div class="col">
                <form action="{{route('sleep.store')}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Начало</button>
                </form>
			</div>
            @if($sleep->sleep_start_at)
			<div class="col">
                <form action="{{route('sleep.update', $sleep)}}" method="post">
                    @csrf
                    @method('patch')
                    <button class="btn btn-warning" type="submit">Конец</button>
                </form>
			</div>
            @endif
        </div>
            <div class="row mb-5">
                @if($sleep->sleep_start_at)
                <div class="col">
                    <input class="form-control form-control-sm" name="sleep_start_at" value="{{$sleep->sleep_start_at}}" readonly>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm" name="sleep_finish_at" value="{{$sleep->sleep_finish_at}}" readonly>
                </div>
                @endif
            </div>
		<div class="row">
			<h2>Кормление</h2>
		</div>
        <div class="row row-cols-2 mb-3">
            <div class="col">
                <form action="{{route('eat.store')}}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Начало</button>
                </form>
            </div>
            @if($eat->eat_start_at)
                <div class="col">
                    <form action="{{route('eat.update', $eat)}}" method="post">
                        @csrf
                        @method('patch')
                        <button class="btn btn-warning" type="submit">Конец</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="row mb-5">
            @if($eat->eat_start_at)
                <div class="col">
                    <input class="form-control form-control-sm" name="eat_start_at" value="{{$eat->eat_start_at}}" readonly>
                </div>
                <div class="col">
                    <input class="form-control form-control-sm" name="eat_finish_at" value="{{$eat->eat_finish_at}}" readonly>
                </div>
            @endif
        </div>
		<div class="row">
			<h2>Прогулка</h2>
		</div>
        <div class="row row-cols-2 mb-3">
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
                        <button class="btn btn-warning" type="submit">Конец</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="row mb-5">
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


	<script src="{{asset('../assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
