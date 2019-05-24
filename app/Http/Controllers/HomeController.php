<?php

namespace App\Http\Controllers;
use App\AdminModels\Newsevent;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	public function landingpage()
    {
		$all_records = NewsEvent::all();
		return view('welcome')->with(["newsevents" => $all_records, "testvar" => "second variable"]);
    }
}