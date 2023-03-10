<?php

namespace App\Http\Controllers\Diapers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diapers\StoreDiaperFormRequest;
use App\Http\Requests\Diapers\UpdateDiaperFormRequest;
use App\Models\Diapers\Diaper;
use Illuminate\Support\Facades\Auth;

class DiaperController extends Controller
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
    public function store(StoreDiaperFormRequest $request)
    {
        $data = $request->validated();
        $diaper = new Diaper();
        $diaper->changed_at = date('Y-m-d H:i:s');
        $diaper->user_id = Auth::id();
        $diaper->comment = $data['comment'] ?? null;
        $diaper->save();
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
    public function update(UpdateDiaperFormRequest $request, Diaper $diaper)
    {
        $data = $request->validated();
        $diaper->update([
            'changed_at' => date('Y-m-d H:i:s'),
            'comment' => $data['comment'] ?? $diaper->comment,
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
