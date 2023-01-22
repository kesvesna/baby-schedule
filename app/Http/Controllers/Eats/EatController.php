<?php

namespace App\Http\Controllers\Eats;

use App\Http\Controllers\Controller;
use App\Http\Requests\Eats\StoreEatFormRequest;
use App\Http\Requests\Eats\UpdateEatFormRequest;
use App\Models\Eats\Eat;
use App\Models\Sleeps\Sleep;
use App\Models\Walks\Walk;
use Illuminate\Http\Request;

class EatController extends Controller
{
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
        $eat = new Eat();
        $eat->eat_start_at = date('Y-m-d H:i:s');
        $eat->save();
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
    public function update(Eat $eat)
    {
        $eat->update([
            'eat_finish_at' => date('Y-m-d H:i:s')
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
}
