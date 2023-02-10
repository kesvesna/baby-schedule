<?php

namespace App\Http\Controllers\Sleeps;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sleeps\SleepFilterRequest;
use App\Http\Requests\Sleeps\StoreSleepFormRequest;
use App\Http\Requests\Sleeps\UpdateSleepFormRequest;
use App\Models\Sleeps\Sleep;
use App\Models\Eats\Eat;
use App\Models\Walks\Walk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SleepController extends Controller
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
    public function index()
    {
        //
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
    public function store()
    {
        $sleep = new Sleep();
        $sleep->sleep_start_at = date('Y-m-d H:i:s');
        $sleep->user_id = Auth::id();
        $sleep->save();
        return redirect()->route('site.index');
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
    public function update(Sleep $sleep)
    {

        $finish = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $sleep->sleep_start_at);

        $sleep_time = $finish->diffInSeconds($start);

        $sleep->update([
            'sleep_finish_at' => $finish,
            'sleep_time' => $sleep_time,
        ]);

        return redirect()->route('site.index');
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

    public function sleep_report(SleepFilterRequest $request)
    {

        $data = $request->validated();

        $sleeps = isset($data['sleep_start_at']) ?
            Sleep::where('sleep_start_at', '>=', $data['sleep_start_at'])->where('user_id',  Auth::id())->get()->toArray()
            :
            Sleep::where('user_id',  Auth::id())->get()->toArray();

        $total_sleep = round(array_sum($sleeps)/3600, 1);

        $start_dates = Sleep::where('user_id', Auth::id())->orderBy('sleep_finish_at', 'asc')->get();
        $start_dates = $start_dates->map(function($start_date){
            return  \Carbon\Carbon::parse($start_date->sleep_start_at)->format('Y-m-d');
        });

        $start_dates = $start_dates->unique();

        $finish_dates = Sleep::where('user_id', Auth::id())->orderBy('sleep_finish_at', 'desc')->get();
        $finish_dates = $finish_dates->map(function($finish_date){
            return  \Carbon\Carbon::parse($finish_date->sleep_finish_at)->format('Y-m-d');
        });

        $finish_dates = $finish_dates->unique();

        return view('sleeps.report',[
            'total_sleep' => $total_sleep,
            'start_dates' => $start_dates,
            'finish_dates' => $finish_dates,
        ]);
    }
}
