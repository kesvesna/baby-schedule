<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Filters\Eats\EatFilter;
use App\Http\Filters\Sleeps\SleepFilter;
use App\Http\Filters\Walks\WalkFilter;
use App\Http\Requests\Sleeps\SleepFilterRequest;
use Illuminate\Http\Request;

use App\Models\Sleeps\Sleep;
use App\Models\Eats\Eat;
use App\Models\Walks\Walk;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SleepFilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(SleepFilter::class, ['queryParams' => array_filter($data)]);


        $sleeps = Sleep::filter($filter)->where('user_id',  Auth::id())->get();

        $sleeps = $sleeps->map(function($sleep) {
            $start = strtotime($sleep->sleep_start_at);
            $finish = strtotime($sleep->sleep_finish_at);
            if($finish)
            {
                return $finish - $start;
            }
        });

        $total_sleep = round(array_sum($sleeps->toArray())/3600, 1);

        $filter = app()->make(EatFilter::class, ['queryParams' => array_filter($data)]);

        $eats = Eat::filter($filter)->where('user_id', Auth::id())->get();

        $eats = $eats->map(function($eat) {
            $start = strtotime($eat->eat_start_at);
            $finish = strtotime($eat->eat_finish_at);
            if($finish)
            {
                return $finish - $start;
            }
        });

        $total_eat = round(array_sum($eats->toArray())/3600,1);

        $filter = app()->make(WalkFilter::class, ['queryParams' => array_filter($data)]);

        $walks = Walk::filter($filter)->where('user_id', Auth::id())->get();

        $walks = $walks->map(function($walk) {
            $start = strtotime($walk->walk_start_at);
            $finish = strtotime($walk->walk_finish_at);
            if($finish)
            {
                return $finish - $start;
            }
        });

        $total_walk = round(array_sum($walks->toArray())/3600, 1);

        $dates = Sleep::where('user_id', Auth::id())->get();
        $dates = $dates->map(function($date){
            return  \Carbon\Carbon::parse($date->sleep_start_at)->format('Y-m-d');
        });

        $dates = $dates->unique();

        return view('reports.index', [
           'dates' => $dates,
            'old_filter' => $data,
            'total_sleep' => $total_sleep,
            'total_eat' => $total_eat,
            'total_walk' => $total_walk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
