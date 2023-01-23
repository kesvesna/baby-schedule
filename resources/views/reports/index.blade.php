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
    <script src="{{asset('../assets/js/chart.umd.js')}}"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('site.index')}}">Режим ребенка</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link   {{ request()->routeIs('site.index')?'active':'' }}" aria-current="page" href="{{route('site.index')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('report.index')?'active':'' }}" href="{{route('report.index')}}">Отчет</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-3">
        <div class="row row-cols-1">
            <label for="date" class="form-label">Выберите дату</label>
            <form action="{{route('report.index')}}" method="get">
            <select
                name="date"
                id="date"
                class="form-select form-select-sm"
                onchange="this.form.submit()">
                <option value="">За все время ...</option>
            @forelse($dates as $date)
                    <option value="{{$date}}" @if(isset($old_filter['date']) && $old_filter['date'] == $date) selected @endif>{{$date}}</option>
                @empty
                  <option value="">Нет записей</option>
                @endforelse
            </select>
            </form>
</div>
</div>

<div class="row d-flex justify-content-around">
    <div class="col-11 col-md-7">
        <canvas id="barDiagram"></canvas>
    </div>
</div>

<script>

    const sleep_time = {!! json_encode($total_sleep) !!};
    const eat_time = {!! json_encode($total_eat) !!};
    const walk_time = {!! json_encode($total_walk) !!};

    const ctx2 = document.getElementById('barDiagram');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Сон', 'Кормление', 'Прогулка'],
            datasets:  [{
                label: 'Часов',
                data: [sleep_time, eat_time, walk_time],
                backgroundColor: [
                    'rgba(178, 222, 39, 0.7)',
                    'rgb(159, 90, 253, 0.7)',
                    'rgb(254, 221, 0, 0.7)',
                ],
                borderWidth: 0,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Режим ребенка',
                    font: {
                        weight: 'bold',
                        size: '16',
                    },
                },
                legend: {
                    display: false,
                }
            }
        }
    });
</script>

<script src="{{asset('../assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>

