<?php

namespace App\Http\Controllers\ACs;

use App\AdminModels\Latestevent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LatestEvents extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.latestEventslist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createlatestEvent');
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
     * @param  \App\AdminModels\Latestevent  $latestevent
     * @return \Illuminate\Http\Response
     */
    public function show(Latestevent $latestevent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminModels\Latestevent  $latestevent
     * @return \Illuminate\Http\Response
     */
    public function edit(Latestevent $latestevent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminModels\Latestevent  $latestevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Latestevent $latestevent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminModels\Latestevent  $latestevent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Latestevent $latestevent)
    {
        //
    }
}
