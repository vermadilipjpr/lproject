<?php

namespace App\Http\Controllers\Acs;

use App\AdminModels\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
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
		$all_records = State::all();
		return view('admin.statesList')->with("all_records", $all_records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.stateCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validate data before saving. */
		request()->validate(["state_name" => ["required","max:50"]], StateController::messages());
		/* Save now. */
		$newsevents = new State;
		$newsevents->statename = $request->state_name;
		$newsevents->save();
		return redirect()->route('statemaster.index')->with('alert-success', 'The record was saved successfully');
    }
	
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public static function messages()
	{
		return [
			'state_name.required' => 'Please enter State Name.',
			'state_name.max' => 'Maximum 50 characters are allowed.'
		];
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminModels\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminModels\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('admin.stateEdit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminModels\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminModels\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}
