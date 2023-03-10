<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Eats\Eat;
use App\Models\Sleeps\Sleep;
use App\Models\Walks\Walk;
use App\Models\Diapers\Diaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
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
       $sleep = Sleep::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
       $eat = Eat::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
       $walk = Walk::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $diaper = Diaper::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();


        return view('site.index',[
            'sleep' => $sleep,
            'eat' => $eat,
            'walk' => $walk,
            'diaper' => $diaper,
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
    public function store()
    {
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
