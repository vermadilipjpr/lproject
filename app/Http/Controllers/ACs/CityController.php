<?php

namespace App\Http\Controllers\Acs;

use App\AdminModels\City;
use App\AdminModels\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$cities = DB::table("cities")->join("states","cities.stateid","=","states.id")->select("states.statename","cities.id","cities.cityname")->get();
        return view("admin.cityList",compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$states = State::select('id','statename')->get();
        return view("admin.cityCreate", compact("states"));
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
		request()->validate(
			[
				"state_id"	=> ["required"],
				"city_name"	=> ["required", "max:150"],
			], 
			CityController::messages()
			);
		/* Save now. */
		$newsevents = new City;
		$newsevents->stateid = $request->state_id;
		$newsevents->cityname = $request->city_name;
		$newsevents->save();
		return redirect()->route('citymaster.index')->with('alert-success', 'The record was saved successfully');
    }
	
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public static function messages()
	{
		return [
			'state_id.required' => 'Please enter State Name.',
			//'state_id.integer' => 'Please enter integer value only',
			'city_name.required' => 'Please enter City Name.',
			'city_name.max' => 'Maximum 150 characters are allowed.',
		];
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminModels\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminModels\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminModels\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminModels\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
