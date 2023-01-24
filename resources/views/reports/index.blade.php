@extends('main')

@section('title', 'Главная')

@section('header')
    @include('menu')
@endsection

@section('content')
<div class="container my-3">


@if(count($dates) > 0)
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
@else
    <h5>Нет данных для отчета ...</h5>
@endif
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
                    beginAtZero: true,
                    ticks: {
                        font: {
                            size: '12',
                        },
                    },
                },
                x: {
                    ticks: {
                        font: {
                            size: '12',
                        }
                    }
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
@endsection

