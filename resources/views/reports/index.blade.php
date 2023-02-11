@extends('main')

@section('title', 'Общий отчет')

@section('header')
    @include('menu')
@endsection

@section('content')
<div class="container my-3">


@if(count($dates) > 0)
        <div class="row row-cols-1">
            <label for="date" class="form-label">Выберите дату</label>
            <form action="{{route('report.index')}}" method="get">
                @csrf
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

@if(isset($old_filter['date']))
<div class="container my-4">

    @if($sleeps->count() > 0)
<div class="row mb-3">
    <h4>Сон</h4>
    <table class="table-striped table-bordered table-responsive table shadow table-sm">
        <thead class="alert-success">
        <tr>
            <th>
                Начало
            </th>
            <th>
                Конец
            </th>
            <th>
                Время
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($sleeps as $sleep)
            <tr>
                <td>
                    {{$sleep->sleep_start_at}}
                </td>
                <td>
                    {{$sleep->sleep_finish_at}}
                </td>
                <td>
                    {{$sleep->sleep_time}}
                </td>
            </tr>
            @endforeach
        <tr>
            <th>
                Кол-во: {{$sleeps->count()}}
            </th>
            <th>
                Всего: {{$total_sleep}} ч.
            </th>
            <th>
                Среднее: {{round($total_sleep/$sleeps->count(), 2) * 60}} мин.
            </th>
        </tr>
        </tbody>
    </table>
</div>
    @else
        <div class="row my-3">
            <h4>Сон нет данных ...</h4>
        </div>
    @endif

    @if($eats->count() > 0)
    <div class="row mb-3">
        <h4>Еда</h4>
        <table class="table-striped table-bordered table-responsive table shadow table-sm">
            <thead class="alert-primary">
            <tr>
                <th>
                    Начало
                </th>
                <th>
                    Конец
                </th>
                <th>
                    Время
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($eats as $eat)
                <tr>
                    <td>
                        {{$eat->eat_start_at}}
                    </td>
                    <td>
                        {{$eat->eat_finish_at}}
                    </td>
                    <td>
                        {{$eat->eat_time}}
                    </td>
                </tr>
            @endforeach
            <tr>
                <th>
                    Кол-во: {{$eats->count()}}
                </th>
                <th>
                    Всего: {{$total_eat}} ч.
                </th>
                <th>
                    Среднее: {{round($total_eat/$eats->count(), 2) * 60}} мин.
                </th>
            </tr>
            </tbody>
        </table>
    </div>
        @else
            <div class="row my-3">
                <h4>Еда нет данных ...</h4>
            </div>
        @endif

    @if($walks->count() > 0)
    <div class="row mb-3">
        <h4>Прогулка</h4>
        <table class="table-striped table-bordered table-responsive table shadow table-sm">
            <thead class="alert-info">
            <tr>
                <th>
                    Начало
                </th>
                <th>
                    Конец
                </th>
                <th>
                    Время
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($walks as $walk)
                <tr>
                    <td>
                        {{$walk->walk_start_at}}
                    </td>
                    <td>
                        {{$walk->walk_finish_at}}
                    </td>
                    <td>
                        {{$walk->walk_time}}
                    </td>
                </tr>
            @endforeach
            <tr>
                <th>
                    Кол-во: {{$walks->count()}}
                </th>
                <th>
                    Всего: {{$total_walk}} ч.
                </th>
                <th>
                    Среднее: {{round($total_walk/$walks->count(), 2) * 60}} мин.
                </th>
            </tr>
            </tbody>
        </table>
    </div>
    @else
        <div class="row my-3">
            <h4>Прогулка нет данных ...</h4>
        </div>
    @endif

        @if($diaper_changes->count() > 0)
    <div class="row mb-3">
        <h4>Замена памперса</h4>
        <table class="table-striped table-bordered table shadow table-sm table-responsive">
            <thead class="alert-warning">
            <tr>
                <th>
                    Время
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($diaper_changes as $change)
                <tr>
                    <td>
                        {{$change->changed_at}}
                    </td>
                </tr>
            @endforeach
            <tr>
                <th>
                    Кол-во: {{$diaper_changes->count()}}
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@else
    <div class="row my-3">
        <h4>Замена памперса нет данных ...</h4>
    </div>
@endif
@endif

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
    const diaper_changers = {!! json_encode($total_diaper_changes) !!};

    const ctx2 = document.getElementById('barDiagram');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Сон', 'Кормление', 'Прогулка', 'Замена памперсов'],
            datasets:  [{
                label: '',
                data: [sleep_time, eat_time, walk_time, diaper_changers],
                backgroundColor: [
                    'rgba(178, 222, 39, 0.7)',
                    'rgb(159, 90, 253, 0.7)',
                    'rgb(254, 221, 0, 0.7)',
                    'rgb(254, 100, 0, 0.7)',
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

