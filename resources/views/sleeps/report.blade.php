@extends('main')

@section('title', 'Сон отчет')

@section('header')
    @include('menu')
@endsection

@section('content')
<div class="container my-3">
@if(count($start_dates) > 0)
        <div class="row row-cols-1">
            <form action="{{route('sleep-report')}}" method="post">
                @csrf
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col">
                        <label for="sleep_start_at" class="form-label">Начало периода</label>
                            <input type="date" id="sleep_start_at" name="sleep_start_at" class="form-control form-select-sm" value="">
                    </div>
                    <div class="col">
                        <label for="sleep_finish_at" class="form-label">Конец периода</label>
                        <input type="date" id="sleep_finish_at" name="sleep_finish_at" class="form-control form-select-sm" value="">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-sm btn-primary">Найти</button>
                    </div>

            </div>
            </form>
</div>
</div>

<div class="row d-flex justify-content-around">
    <div class="col-11 col-md-7">
        <canvas id="sleepDiagram"></canvas>
    </div>
</div>
@else
    <h5>Нет данных для отчета ...</h5>
@endif
<script>

    const sleep_time = {!! json_encode($total_sleep) !!};

    const sleepDiagram = document.getElementById('sleepDiagram');

    const labels = ['2022-01-01', '2023-02-02'];

    const data = {
        labels: labels,
        datasets: [{
            axis: 'y',
            label: 'Сон ребенка',
            data: [sleep_time, sleep_time - 50],
            fill: false,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(200, 150, 100, 0.2)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(200, 150, 100)',
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data,
        options: {
            indexAxis: 'y',
        }
    };

    new Chart(sleepDiagram, config);

</script>
@endsection

